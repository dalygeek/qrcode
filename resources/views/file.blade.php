@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')

{{-- <section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="input" class="label">File</label>
                    <p class="control">
                        <input type="file" name="" id="">
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Preview</label>
                    <qr :content="QrContent" type="text"></qr>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="section" >
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="input" class="label">Fichier</label>
                    <p class="control">
  
<form method="POST" enctype="multipart/form-data" id="upfile" action="{{ url('upfile') }}" >
    {{ csrf_field() }}
      <div class="row">

        
          <div class="col-md-12">
              <div class="form-group">
                  <input required  type="file" name="upfile" class="file-input" placeholder="Choisir un fichier" onchange="ValidateSize(this)" id="file"  >
                
                    @if (session('status'))
                    <div class="alert alert-success">
                        
                       <span class="has-text-success">votre QR Code est generer avec succeés</span>
                    </div>
                    <input type="hidden" id="qr-text" value="{{ session('status') }}">
                    
                @endif
                   
              </div>
          </div>
         <br>
         <br>
         <br>
          <div class="col-md-12">
              <button type="submit" class="button  is-primary"   id="submit">Générer QR Code</button>


          </div>
          <br>
          <h2 style="color: red">Le lien de fichier est:</h2><h2>{{session('status')}}</h2>
      </div>
     
  </form>
</p>

</div>
            </div>
<div class="column">
    <div class="field">
@if (session('status'))
<p id="qr-result" >Votre QR code:</p>
<canvas id="qr-code"></canvas>
@endif     
</div>


</div>
</div>
</div>
<br/>

<br/>


@endsection
