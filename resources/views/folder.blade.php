@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')


@include('partials.user-links')


<div class="container">
    <br>
    <br>
    <br>
    <a class="button is-warning" href="{{ url('/folders') }}" >
        Retourner 
    </a> 
    
    <div  class="columns is-multiline is-mobile is-pulled-right">

        <div class="column is-one-half ">
       
           

    <form action="{{ url('/affecter') }}" method="POST"  enctype="multipart/form-data" >
        {{ csrf_field() }}

        <h1 style="text-align: center;font-size:26px">Ajouter un QR a ce dossier </h1><br>

        <input type="hidden" name="id" value="{{$id}}">
        <div class="select">
            <select name="qr">
                @foreach ($qrcodes as $qrcode)
                    <option value="{{$qrcode->id}}">{{$qrcode->name}}</option>
                @endforeach
              
            </select>
        </div>


            <br><br>

            <button type="submit" class="button is-success" >Valider</a>
        </form>
        
        </div></div>
    
    <br>
    <br>
    <br><br>
        <br>
    <br>
    <hr>
    <div class="title" style="text-align: center">
        Liste des QR codes dans ( FOLDER )
    </div>




    <div id="myUL" class="columns is-multiline is-mobile">

    @foreach ($list as $liste)
    

            @foreach ($qrcodes as $link)
                    @if($liste->id_qr==$link->id and $liste->id_folder==$id)
                        
                    
                <div class="column is-one-quarter">
                    
                  <lop>
                        <a @click="fireModal('{{ $link->id }}')">
                        <img src="https://i.ibb.co/CJ0SN1P/thorOne.png" alt="">
                       <div class="has-text-centered is-size-4"> {{ $link->name }} </div> </a>
                    <modal-qr 
                        ref="{{ $link->id }}" 
                        static-link="{{ $link->static_link }}"
                        set-name="{{ $link->name }}"
                        set-description="{{ $link->description }}"
                        set-link="{{ $link->dynamic_link }}"
                        >
                    </modal-qr>
                  </lop>
    
                </div>
                    @endif
            @endforeach
    @endforeach

    </div>
    <br>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
   --}}
{{-- 
    <div id="ex1" class="modal" style="margin-top:320px">
        
          <form action="{{ url('/affecter') }}" method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <h1 style="text-align: center;font-size:26px">Ajouter un QR a ce dossier </h1><br>

            <input type="hidden" name="id" value="{{$id}}">
            <div class="select">
                <select name="qr">
                    @foreach ($qrcodes as $qrcode)
                        <option value="{{$qrcode->id}}">{{$qrcode->name}}</option>
                    @endforeach
                  
                </select>
            </div>


<br><br>


    <a href="#" class="button is-warning" rel="modal:close">Close</a>
    <button type="submit" class="button is-success" >Valider</a>
            </form>
  </div> --}}




</div>

@endsection
