@extends('Backoffice.layout')
@section('content')
    
<div class="row">
   
    <div class="col-lg-6">
        <div class="card">
         
            <div class="card-header">
          
                <h4 class="card-title">Ajouter un Qr Code</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('handleAddQr') }}" method="POST" >
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
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Nom</label>
                        <input class="form-control" name="name" type="text" id="default-input" required placeholder="Nom">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Description</label>
                        <textarea id="description" class="form-control" name="description" rows="4" cols="50">
                             
                            </textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Contenu</label>
                        <input class="form-control" type="text" name="link" id="default-input" placeholder="Contenu">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Fichier</label>
                        <input class="form-control" type="File" name="upfile" id="file-input"  >
                    </div>


                  {{--   <div class="mb-4">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="">---Choisir Type--</option>
                            <option value="7">Admin</option>
                            <option value="9">User</option>
                        </select>
                    </div>--}}
                    {{-- <div class="mb-4">
                        <label class="form-label" for="default-input">Role</label>
                        <input class="form-control" type="email" name="email" id="default-input"  required placeholder="Email">
                        <select class="select" name="role" id="role">
                            <option value="7">Admin</option>
                            <option value="9">User</option>
                        </select>
                    </div> 

                    <div class="mb-4">
                        <label class="form-label" for="default-input">Mot de passe</label>
                        <input class="form-control" type="password" name="pass" id="default-input" required placeholder="Nouveau mot de passe">
                    </div>--}}
           
                    <button type="submit" class="btn btn-lg btn-success">
                        Valider
                    </button>
                    <a href="{{route('showListeQrs')}}" class="btn btn-lg btn-secondary">
                        Retourner
                    </a>
                </form>
            </div>
        </div>
    </div>
    
</div>

@endsection
