<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dropboxController extends Controller
{
    
    public function Dropbox(){


        return view('dropbox');



    }


    public function Updropbox(Request $RequestInput){
            // $file_src=$RequestInput->file('myfile');

            // $is_file_upload= Storage::disk('google')->put('QrCode',$file_src);
            // echo($is_file_upload);
            //dd($file_src);
            // dd($is_file_upload,$file_src);


            $content = $RequestInput->file('myfile');
            // $name=$content
            $details=Storage::disk('google')->put('',$content);
            //$results=Storage::disk('google')->get("1I-xSKvFt2hXuwD0iMfQG_x5NT8rhuMZR");
            $url=Storage::disk('google')->url($details);
            dd($content,$details,$url);
            // if($is_file_upload){
            //      return redirect()->back()->withErrors(['msg'=>'success']);
            // }
            // else{
            //     return redirect()->back()->withErrors(['msg'=> 'fail']);
            // }

        
    }
}
