@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

@include('partials.bulma-header')

@include('partials.secondary-nav')


{{-- @include('partials.user-links') --}}
<div id="ex1" class="modal" style="margin-top:50px;z-index: 3;">
  {{-- <form action="" method="post"> --}}
    <form action="{{ url('/addfolder') }}" method="POST" enctype="multipart/form-data" >
      {{ csrf_field() }}

      <h1 style="text-align: center;font-size:26px">Ajouter une répertoire</h1><br>

      <div class="field">
          <label for="name">Nom de repertoire </label>
          <br>
          <p class="control">
              <input required type="text" name="name" class="input" id="name">
          </p>
      </div>
      <label for="name">choisir image de couverture <span style="color: rgb(237, 167, 61)">(optionel)</span>  </label>
      <br><br>
      <div class="file is-info has-name">

        <label class="file-label">
            <input class="file-input" type="file" name="upfile" id="upfile">
            <span class="file-cta">
            <span class="file-icon">
              <i class="fa fa-upload"></i>
            </span>
            <span class="file-label">
              image
            </span>
          </span>
          <span class="file-name">
            Aucun fichier choisi
          </span>
        </label>
      </div>




<br><br>


<a href="#" class="button is-warning" rel="modal:close">Close</a>
<button type="submit" class="button is-success" >Valider</a>
      </form>
</div>


<div class="container">
    <br>
    <br>
    <br> 
    <a class="button is-info" href="#ex1" rel="modal:open" style="float: right">
        Ajouter un dossier 
    </a>
    <br>
    <br>
    <hr>
    <div class="title" style="text-align: center">
        Liste de Vos Dossiers
    </div>




    <div id="myUL" class="columns is-multiline is-desktop">


        @foreach ($folders as $folder)

        <div class="column is-one-quarter">
            
          <a href="{{ url("/folder/$folder->id") }}">

              {{-- <a @click="fireModal('{{ $link->id }}')"> --}}
                @if($folder->emplacement==NULL)
                <img src="https://i.ibb.co/5rQtWcr/3767084.png" alt="">
                @else
              <img src="{{$folder->emplacement}}" alt="">
              @endif
              <div class="has-text-centered is-size-4"> {{ $folder->name }} </div> 
              
              
          </a>

        </div>

      


    @endforeach
    </div>
    <br>


  <!-- Link to open the modal -->
  {{-- <p><a >Open Modal</a></p> --}}

</div>



{{-- 
<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modal title</p>
        <button class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <!-- Content ... -->
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success">Save changes</button>
        <button class="button">Cancel</button>
      </footer>
    </div>
  </div> --}}
  

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
@endsection
