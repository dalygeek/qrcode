@extends('Backoffice.layout')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Modifier un utilisateur </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('handleChangeUser') }}" method="POST" >
                        {{ csrf_field() }}

                        @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="mb-4">
                            <label class="form-label" for="default-input">Username</label>
                            <input class="form-control" name="username" type="text" id="default-input" value="{{$user->name}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="default-input">Email</label>
                            <input class="form-control" name="email" type="email" id="default-input" value="{{$user->email}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="default-input">Nombre des QRs</label>
                            <input class="form-control" name="nb" type="number" id="default-input" value="{{$user->nb_qr}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="">---Choisir Type--</option>
                                <option @isset($user->role) @if($user->role == 7) selected @endif @endisset value="7">Admin</option>
                                <option @isset($user->role) @if($user->role == 9) selected @endif @endisset value="9">User</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-danger"  for="default-input">Nouveau mot de passe (Au cas de changement)</label>
                            <input class="form-control" name="pass" type="password" id="default-input" placeholder="Nouveau mot de passe">
                        </div>
               
                        <button type="submit" class="btn btn-lg btn-success">
                            Valider
                        </button>
                        <a href="{{route('showListeUsers')}}" class="btn btn-lg btn-secondary">
                            Retourner
                        </a>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection
