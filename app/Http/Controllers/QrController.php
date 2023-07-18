<?php

namespace App\Http\Controllers;

use Auth;
use Charts;
use Response;
use App\QrCode;
use App\tokens;
use QrGenerator;
use App\Folder_Qr;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Storage;

class QrController extends Controller
{
    public function __construct()
    {
        // Policies?
        //$this->middleware('auth')->except(['redirect', 'download']);
    }

    // Generate a new dynamic Qr Code
    public function generate(Request $request)
    {
       // dd(Auth::user()->nb_qr);
        

        $user=Auth::user()->id;
        $role=Auth::user()->role;
        $nb_qr=Auth::user()->nb_qr ;
        

        if($role == 7 && $nb_qr == NULL ){
            alert()->error("S'il vous plait de choisir un plan");
            return redirect('/pricing');
        }
         
        $created_qr=QrCode::where('user_id', $user)->count();

        $available=intVal($nb_qr) - intVal($created_qr);
        

        if($role == 7 && $available <= 1 ){
            alert()->error("Nombres maximales des QR Codes atteints renouvller votre plan");
            return redirect('/pricing');
        }
 
       $ok= $this->validate($request, [
            'name' => "required|unique:qr_codes,name,NULL,id,user_id,$user",
            
            
       ]);


        if ($ok){
   
           
       if($request->file('upfile')){


            // Get filename with the extension
            $filenameWithExt = $request->file('upfile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('upfile')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $download_link= $request->file('upfile')->storeAs('public', $fileNameToStore);
            $download_link= env('APP_URL','ERROR').'/storage/'. $fileNameToStore;

        }
     


        if($request->link != NULL){

            $dynamic_link = $request->link;
            if (strpos($dynamic_link, '://') !== True) {
                $dynamic_link=$dynamic_link;                
            }
        }
        elseif($request->file('upfile') != NULL) {
            $dynamic_link =$download_link;
        }
        else{
            $dynamic_link ="";
        }
        $name= $request->name;
        $static_link_Name = preg_replace('/\s+/', '-', $name);
       

       $lastqr=QrCode::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            
            'dynamic_link' => $dynamic_link,
            //'static_link' => $this->getNewStaticLink(),
            'static_link' => $static_link_Name,
            //'download_link' => $download_link
        ]);

        // dd($lastqr->id);

        $folder_qr=new Folder_Qr;
        $folder_qr->id_folder=$request->folder;
        $folder_qr->id_qr=$lastqr->id;

        $folder_qr->save();


        alert()->success("QR Code generated ");
        return redirect('/web');}
        else{
            alert()->success("Name must be unique ");
             return redirect('/web');}
        }
    
    



    public function redirect($QrCodeLink)
    {
         
       $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
      
        if($qrcode != null){
            $qrcode->scanned+=1;
            $qrcode->save();
        return redirect($qrcode->dynamic_link);
         }
         else{
         $qrcode="/";
         return redirect($qrcode);
         }
    }

    public function update($QrCodeLink, Request $request)
    {
        // Check if this user is connected to the link
        $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
	$old_link=$qrcode->dynamic_link;
        $new_link=$request['dynamic_link'];
        // if (Auth::user()->hasPermission($qrcode)) {
        if ($new_link != $old_link){
                    $SERVER_API_KEY = 'AAAALS_ltZ8:APA91bGPJB6lFlcsFSsVCrvQnjWpVqsF4o3OeIu9NKN1qxQ0h5gs8gChHkJ5GUFJTCwHeDV__IEXujkYdVvPTnIutAT7cmoK6Lb_eTQoMQ7Ewk4NvUB5DyHYe_Qcug2i2MJM7FSnaylx';
                    $tokens = Tokens::all();
                    $a=array();
                    foreach($tokens as $i){
                        $a[]=($i['token']);
                        
                    }
                    //array contenu

                    //dd($a);
                    //longeur

                    //dd(count($a));

                   // $count=count($a);
                    // for ($i = 0; $i < $count; $i++) {
                    //     $a[$i];
                    // }
                    
                    $token_1 = 'dgK6J8niRdiTsUY5GwsumH:APA91bF7by2_wWmmdvqgjjU8I1Y_OMlObGnIw8hYMPVAe32_80a7i05BcgB_57Xk_hpgBMKuz6fw1YnyVVQRWTuACbwiMQuZklnvm-eke2P-8YX9GaidN2Gl3hSEbvZ7847yjsAWkNEC';
                	$description=$request['description'];
			


                    $data = [
                
                        "registration_ids" => $a,

                
                        "notification" => [
                
                            "title" => "$qrcode->name",
                
                            "body" => "$description",

			    "image" => "https://thorsys.co/wp-content/uploads/2020/12/thorsysmini.png",
                
                            "sound"=> "default" // required for sound on ios
                
                        ],
                
                    ];
                   // dd($data);
                
                    $dataString = json_encode($data);
                   // dd($dataString);
                    $headers = [
                
                        'Authorization: key=' . $SERVER_API_KEY,
                
                        'Content-Type: application/json',
                
                    ];
		   //dd($headers);
                
                    $ch = curl_init();
                
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                
                    curl_setopt($ch, CURLOPT_POST, true);
                
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                
                    $response = curl_exec($ch);
                
                 //  dd($response);
                
                }
            $qrcode->update($request->all());
            alert()->success('Qr Code updated');
        // }

        return redirect()->back();
    }

    public function drop($QrCodeLink)
    {
        $qrcode = QrCode::where('static_link', $QrCodeLink)->first();
        // if (Auth::user()->hasPermission($qrcode)) {
            $qrcode->delete();
            alert()->success('Qr Code Deleted');
        // }

        return redirect()->back();
    }

    public function download(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'size' => 'required|max:5000',
        ]);
        if ($request->codeData === null) {
            alert()->error('No data provided');
            return redirect()->back();
        }
        $response = Response::make(QrGenerator::format('png')->color(37, 35, 91)->size($request->size)->generate($request->codeData), 200, ['Content-Type' => 'image/png']);
        return $response;
    }

    //
    // Helpers
    //
    protected function getNewStaticLink($count = 10)
    {
        $link = str_random($count);
        if (QrCode::where('static_link', $link)->first()) {
            $this->getNewStaticLink($count++);
        }
        return $link;
    }

    protected function formatDynamicLink($link)
    {
        $link = strtolower($link);
        $url = parse_url($link);
        if (array_key_exists('scheme', $url) && ($url['scheme'] == 'https' || $url['scheme'] == 'http')) {
            return $link;
        }
        return 'http://' . $link;
    }



	public function chart()
    {
        $names=array();
        $nb_scan=array();
        $qrcodes = QrCode::all();
        
        //dd($qrcodes);
        foreach($qrcodes as $qrcode){
            if ($qrcode->scanned != null){
        array_push($names, $qrcode->name);
        array_push($nb_scan, $qrcode->scanned);
            }
        }
        //dd($nb_scan);
        $chart=Charts::create('bar', 'highcharts')
        
        ->title('Nombres de scans des QR Codes')
        ->elementLabel("Nombre de scans")
        ->labels($names)
        ->values($nb_scan)
        ->dimensions(1000,500)
        ->responsive(true);

        return view('chart',compact('chart'));

    }

    

    public function showAddQr(){
        return view('Backoffice.qrs.add');
    } 

    public function handleAddQr(Request $request){

        $ok= $this->validate($request, [
            'name' => "required|unique:qr_codes,name",
            
            
       ]);
      // dd($request->file('upfile'));

        if ($ok){
        $user=Auth::user()->id;


        if($request->file('upfile')){


            // Get filename with the extension
            $filenameWithExt = $request->file('upfile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('upfile')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $download_link= $request->file('upfile')->storeAs('public', $fileNameToStore);
            $download_link= env('APP_URL','ERROR').'/storage/'. $fileNameToStore;

        }
     


        if($request->link != NULL){

            $dynamic_link = $request->link;
            if (strpos($dynamic_link, '://') !== True) {
                $dynamic_link=$dynamic_link;                
            }
        }
        elseif($request->file('upfile') != NULL) {

            $dynamic_link =$download_link;
        }
        else{
            $dynamic_link ="";
        }
        $name= $request->name;
        $static_link_Name = preg_replace('/\s+/', '-', $name);
       

       $lastqr=QrCode::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            
            'dynamic_link' => $dynamic_link,
            
            'static_link' => $static_link_Name,
            //'download_link' => $download_link
        ]);
        alert()->success("QR Code generated ");
        $qrs=QrCode::latest()->get();
        return view('Backoffice.qrs.index',compact('qrs'));
        //return redirect('/web');
    }
        else{
            alert()->success("Name must be unique ");
             //return redirect('/web');}
             $qrs=QrCode::latest()->get();
            return view('Backoffice.qrs.index',compact('qrs'));
        }

    } 

}
