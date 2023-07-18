<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use App\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ProfileController extends Controller
{

    use RegistersUsers;

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function show()
    {
        return view("profile");
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);
        Auth::user()->update($request->all());
        alert()->success('Your info has been updated');
        return redirect()->back();
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if (Hash::check($request->password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => bcrypt($request->new_password)
            ]);
            alert()->success('Password updated');
        } else {
            alert()->error('Password mismatch');
        }
        return redirect()->back();
    }

    public function showListeUsers(){

        // dd(Auth::user()['role']);
        if(Auth::user()['role'] != 7){
            return redirect()->route('showMain' );

        }; 
        $users=User::all();
        return view('Backoffice.users.index',compact('users'));
    }

    public function showChangePassword($id){
        if(Auth::user()['role'] != 7){
            return redirect()->route('showMain' );

        }; 
        $user=User::where('id',$id)->first();
        return view("Backoffice.users.change",compact('user'));

    }

    public function handleChangePassword(Request $request){

        if(Auth::user()['role'] != 7){
            return redirect()->route('showMain' );

        }; 

        $user=User::where('id',$request->id)->first();
        $user->name=$request->username;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->nb_qr=$request->nb;
        if($request->pass != NULL){
            $this->validate($request,[
                'pass' => 'required|min:6',
          ]);
            $user->password=bcrypt($request->pass);
        }
        $user->save();

        alert()->success("Utilisateur modifieé avec succeés ");


        return redirect()->route('showListeUsers' );
    }


    public function showAddUser(){
        if(Auth::user()['role'] != 7){
            return redirect()->route('showMain' );

        }; 
        return view("Backoffice.users.add");

    }

    public function handleAddUser(Request $request){
  
        if(Auth::user()['role'] != 7){
            return redirect()->route('showMain' );

        }; 
        $this->validate($request,[
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'pass' => 'required|min:6',
      ]);
        $user=new User;
        $user->name=$request->username;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=bcrypt($request->pass);
        $user->save();

        alert()->success("Utilisateur ajouteé avec succeés ");


        return redirect()->route('showListeUsers' );

    }


    public function showListeQrs(){

        
        //$qrs=QrCode::all();
        $qrs=QrCode::latest()->get();
        return view('Backoffice.qrs.index',compact('qrs'));
    }
    

}


