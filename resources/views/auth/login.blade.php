@extends('layouts.app')

@section('content')

    <section class="section bg-custom-2 hero ">
        <div class="hero-body">
            <div class="container has-text-centered" style="color:white">
                <h1 class="title" >
                    User Login
                </h1>
            </div>
        </div>
    </section>

    <div class="container section " >
        <div class="column is-4 is-offset-4">
            <form action="{{ route('login') }}" method="POST" onsubmit="jsFunctionName()">  
                {{ csrf_field() }}
                <div class="field">
                    <label for="email " >E-mail</label>
                    <div class="control ">
                        <input 
                        type="email" 
                        class="input is-rounded{{ $errors->has('email') ? ' is-danger' : '' }}" 
                        id="email" 
                        name="email"
                        autofocus >
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    </div>
                </div>

                <div class="field">
                    <label for="password">Mot de passe</label>
                    <div class="control">
                        <input
                            type="password" 
                            class="input is-rounded {{ $errors->has('password') ? ' is-danger' : '' }}"
                            id="password" 
                            name="password">
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    </div>
                </div>

                <div class="field">
                    <div class="control center-vertically">
                        <button class="button is-primary  is-large is-fullwidth" >Connexion</button>  
                       
                    </div>
                    <a href="{{ url('register') }}">Vous n'avez pas de compte ?</a> 
                </div>

            </form>
            {{-- <hr> --}}
     
            {{-- <h1 style="text-align: center"> OR</h1> --}}


            {{-- <div class="google-btn" >
            <img class="google-img" src="images/gg.jpg"  alt="" width="50px">
             <a class="google-txt" href="{{ route('googleauth') }}" class="" style="background-color:#D6492E;color:white;margin-left:50px"><b> Login with Google</b></a>
             <br><br> --}}
             {{-- <a href="{{ route('facebookauth') }}" class="" style="background-color:blue;color:white"><b> Login with Facebbok</b></a> --}}
            {{-- </div> --}}
            


            </div>



            
            {{-- <button style="margin-left: 450px" class="loginBtn loginBtn--facebook">
                Login with Facebook
              </button> --}}
            
              {{-- <button style="margin-left: 420px;" class="loginBtn loginBtn--google">
               <a  href="{{ route('googleauth') }}" style="color: white;font-size:24px;font-family:Verdana, Geneva, Tahoma, sans-serif">Login with Google</a> 
              </button> --}}
    </div>

@stop


