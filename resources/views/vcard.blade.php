@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')

<section class="section" >
    <div class="container">
        <div class="columns">
            <vCard></vCard>
            <div class="column">
                <div class="field">
                    <label class="label" >Aperçu en direct</label>
                    <qr :content="QrContent" type="vcard"></qr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
