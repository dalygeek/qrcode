@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')

<section class="section" >
    <div class="container" >
        <div class="columns">
            <div class="column">
                <form action="{{ url('/dynamic') }}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        @if (count($errors) > 0)
                        
                        <?php alert()->error("QR Code Name must be unique ") ?>
                        
                         @endif
                    <label for="input" class="label" >Texte:</label>
                    <div class="field has-addons">
                        <p class="control is-expanded">
                            
                            <input type="text"  name="link" id="input" @keydown.enter.prevent class="input" v-model="QrContent">
                        </p>
                        <div class="control">
                            <span class="select">
                                <select v-model="webCodeType">
                                    <option value="Static" title="test">Static</option>
                                    <option value="Dynamic" 
                                            {!! Auth::guest() ? 'disabled' : null !!}
                                            {!! Auth::guest() ? 'title="You have to have an account to use this feature"' : null !!}
                                            >Dynamic</option>
                                </select>
                            </span>
                        </div>
                    </div>

                    @if (Auth::guest())
                        <p class="help is-info">
                            Due to technical limitations, you have to register a free account in order to use the dynamic QR code feature. 
                            However, the static codes still work fine without one.
                        </p>
                    @endif

                    <div v-show="webCodeType == 'Dynamic'">
                        <span class="has-text-danger">*Please choose just one .. File or Link</span> 
                        <br>
                        <div class="field">
                            <label for="name">Name <span class="has-text-success">(required and must be unique)</span> </label>
                            <p class="control">
                                <input required type="text" name="name" class="input" id="name">
                            </p>
                        </div>
                        <label for="">Selectionner le Dossier </label> <br> 
                        <div class="select">
                            <select name="folder">
                              @foreach ($folders as $folder)
                                  
                                <option value="{{$folder->id}}">{{$folder->name}}</option>
                                {{-- <option>With options</option> --}}
                              @endforeach
                              
                             
                            </select>
                          </div>
                          <br><br>

                        <div class="field">
                            <label for="description">Description (optional)</label>
                            <p class="control">
                                <textarea name="description" id="description" class="textarea"></textarea>
                            </p>
                        </div>

                        {{-- <div class="field">
                            <label for="description">Upload File </label>
                            <p class="control">
                                <input type="file"  name="upfile"  id="upfile" class="file" >
                            </p>
                        </div> --}}
                     
                        {{-- <div class="file is-primary">
                            <label class="file-label">
                              <input class="file-input" type="file" name="upfile" id="upfile">
                              <span class="file-cta">
                                <span class="file-icon">
                                  <i class="fa fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Upload File
                                </span>
                              </span>
                            </label>
                          </div> --}}
                          <div class="file is-info has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="upfile" id="upfile">
                                <span class="file-cta">
                                <span class="file-icon">
                                  <i class="fa fa-upload"></i>
                                </span>
                                <span class="file-label">
                                  Fichier …
                                </span>
                              </span>
                              <span class="file-name">
                                Aucun fichier choisi
                              </span>
                            </label>
                          </div>

                        
                        <br>
                        <div class="field">
                            <p class="control">
                                <button class="button is-primary">Générer un QR dynamique</button>
                            </p>
                        </div>
                    </div>
                </form>


            </div>
            <div class="column">
                <div class="field" v-show="webCodeType == 'Static'">
                    <label class="label" >Aperçu en direct</label>
                    <qr :content="QrContent" type="website"></qr>
                </div>
            </div>
        </div>
        @if (!Auth::guest())
        <hr>
        <div >
                <h1>Generer le lien de votre fichier pour faire un mise a jour</h1>
                 <br>
                 <form method="POST" enctype="multipart/form-data" id="showfile" action="{{ url('showfile') }}" >
                    {{ csrf_field() }}
                    <input type="file" name="showfile" id="showfile" required><br> <br>
                    <input type="submit" class="button  is-success" value="generer lien de fichier">
                </form>
                @if (session('status'))

                <h5>Le lien de votre fichier est : </h5><br> <p class="has-text-success">{{session('status')}}</p>
                @endif
            </div>
          

        @endif

    </div>
</section>
<script>

document.addEventListener('DOMContentLoaded', () => {
  // 1. Display file name when select file
  let fileInputs = document.querySelectorAll('.file.has-name')
  for (let fileInput of fileInputs) {
    let input = fileInput.querySelector('.file-input')
    let name = fileInput.querySelector('.file-name')
    input.addEventListener('change', () => {
      let files = input.files
      if (files.length === 0) {
        name.innerText = 'No file selected'
      } else {
        name.innerText = files[0].name
      }
    })
  }

  // 2. Remove file name when form reset
  let forms = document.getElementsByTagName('form')
  for (let form of forms) {
    form.addEventListener('reset', () => {
      console.log('a')
      let names = form.querySelectorAll('.file-name')
      for (let name of names) {
        name.innerText = 'No file selected'
      }
    })
  }
})
</script>
@include('partials.user-links')

@endsection
