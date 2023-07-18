@extends('layouts.app')

@section('content')

    <section class="section hero" style="background-color:#0450d7">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title" style="color:white">
                  
                Bienvenue dans LAQRBOX
                </h1>
                <br>
                <h2 class="subtitle" style="color:white">
                    Veuillez remplir le formulaire d'inscription pour créer un nouveau compte
                </h2>
            </div>
        </div>
    </section>

    <div class="container section" >
        <div class="column is-4 is-offset-4">
            <form action="{{ route('register') }}" method="POST">  
                {{ csrf_field() }}
                <div class="field">
                    <label for="name" >Nom d'utilisateur</label>
                    <div class="control">
                        <input 
                            type="text" 
                            class="input {{ $errors->has('name') ? ' is-danger' : '' }}" 
                            id="name" 
                            name="name"
                            required 
                            autofocus 
                            value="{{ old('name') }}">
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    </div>
                </div>
                
                <div class="field" >
                    <label for="email">E-mail</label>
                    <div class="control">
                        <input 
                            type="email" 
                            class="input {{ $errors->has('email') ? ' is-danger' : '' }}" 
                            id="email" 
                            name="email"
                            required 
                            value="{{ old('email') }}">
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    </div>
                </div>

                <div class="field" >
                    <label for="password">Mot de passe</label>
                    <div class="control">
                        <input 
                            type="password" 
                            class="input {{ $errors->has('password') ? ' is-danger' : '' }}" 
                            id="password" 
                            name="password"
                            required>
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    </div>
                </div>
                
                <div class="field">
                    <label for="password_confirmation" >Confirmation mot de passe</label>
                    <div class="control">
                        <input 
                            type="password" 
                            class="input" 
                            id="password_confirmation" 
                            name="password_confirmation"
                            required>
                    </div>
                </div>
        
                <div class="field">
                    <div class="control center-vertically">
                        <button class="button is-primary">S'inscrire</button>
                        <a href="{{ url('login') }}">Vous avez déjà un compte?</a>
                    </div>
                </div>

            </form>
        </div>
       <!--    <hr>
     
        <h1 style="text-align: center"> OR</h1>
<br>
       <button style="margin-left: 400px;background-color:#DD4B39" class="loginBtn loginBtn--google">
            <a  href="{{ route('googleauth') }}" style="color: white;font-size:24px;font-family:Verdana, Geneva, Tahoma, sans-serif;background-color:#DD4B39">Register with Google</a> 
           </button>
    </div> -->

@stop 

