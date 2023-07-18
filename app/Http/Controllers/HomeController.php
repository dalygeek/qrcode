<?php

namespace App\Http\Controllers;

use Auth;
use App\Folder;
use App\QrCode;
use App\Folder_Qr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class HomeController extends Controller
{
    public function index()
    {

        return redirect('/text');
    }

    public function web()
    {
        $folders=Folder::where('user_id',Auth::id())->get();
        if (Auth::user()) {
            $links = Auth::user()->links;
        }

        return view('web', [
            'active' => 'web',
            'links' => isset($links) ? $links : null,
            'folders' => $folders

        ]);
    }

    public function text()
    {
        return view('text', ['active' => 'text']);
    }

    public function vcard()
    {
        return view('vcard', ['active' => 'vcard']);
    }

    public function location()
    {
        return view('location', ['active' => 'location']);
    }


    public function folders()
    {
        $folders=Folder::where('user_id',Auth::id())->get();

        return view('folders', [
            'active' => 'folder',
            'folders' => $folders

        ]);
    }

    public function affecter(Request $request)
    {

        $list=Folder_Qr::where('id_folder',$request->id)->get();
        foreach($list as $liste){
            if($liste->id_qr ==  $request->qr){
                // dd('ok');
                alert()->error("QR déja existe dans cet repertoire ");

                return redirect()->back(); 
            }

        }



        // $folders=Folder::where('user_id',Auth::id())->get();
        $folder_qr=new Folder_Qr;
        $folder_qr->id_folder=$request->id;
        $folder_qr->id_qr=$request->qr;

        $folder_qr->save();

        alert()->success("QR ajouteé a cet repertoire avec succeés ");

        return redirect()->back();

        // return view('folders', [
        //     'active' => 'folder',
        //     'folders' => $folders

        // ]);
    }
    



    public function showfolder($id){

        // dd($id);
        $qrcodes=QrCode::where('user_id',Auth::id())->get();
        $list=Folder_Qr::all();
        
        // dd($folders);
        // return view('folders', [
        //     'active' => 'folder',
        //     'folders' => $folders

        // ]);

        return view('folder', [
            'active' => 'folder',
            'qrcodes' => $qrcodes,
            'id' => $id,
            'list' => $list

        ]);

    }


    public function handleAddFolder(Request $request){
        
        // dd(Auth::id());

        $folder= new Folder;
        $folder->name=$request->name ;

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
            
     
         
            $folder->emplacement=$download_link;
            
        }
        else{
            $folder->emplacement=NULL;
        }
        $folder->user_id=Auth::id();
        $folder->save();

        alert()->success("Repertoire creé avec succeés ");

        return redirect()->back();
    } 

    public function liste()
    {
        if (Auth::user()) {
            $links = Auth::user()->links;
        }

        return view('liste', [
            'active' => 'liste',
            'links' => isset($links) ? $links : null
        ]);
    }

    public function email()
    {
        return view('email', ['active' => 'email']);
    }

    public function wifi()
    {
        return view('wifi', ['active' => 'wifi']);
    }

    public function about()
    {
        return view('about', ['active' => 'none']);
    }
    public function file(){

        return view('file', ['active' => 'file']);
    }
    public function upfile(Request $request){

        if($request->file('upfile')){
           

            // $content = $request->file('upfile');
    
            // $details=Storage::disk('google')->put('',$content);
  
            // $download_link=Storage::disk('google')->url($details);
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
            
            return redirect('file')->with('status', $download_link);
         
           
        }
        return redirect('file');

    }
    public function showfile(Request $request){

        if($request->file('showfile')){
           

            // $content = $request->file('showfile');
    
            // $details=Storage::disk('google')->put('',$content);
  
            // $download_link=Storage::disk('google')->url($details);

             // Get filename with the extension
             $filenameWithExt = $request->file('showfile')->getClientOriginalName();
             // Get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             // Get just ext
             $extension = $request->file('showfile')->getClientOriginalExtension();
             // Filename to store
             $fileNameToStore= $filename.'_'.time().'.'.$extension;
             // Upload Image
             $download_link= $request->file('showfile')->storeAs('public', $fileNameToStore);
             $download_link= env('APP_URL','ERROR').'/storage/'. $fileNameToStore;
            
            return redirect('web')->with('status', $download_link);
         
           
        }
        return redirect('web');

    }
}
