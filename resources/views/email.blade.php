@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

@include('partials.secondary-nav')

<section class="section" >
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="recipient" class="label" >destinataire</label>
                            <p class="control">
                                <input type="email" id="recipient" class="input" v-model="recipient">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="subject" class="label" >Sujet (facultatif)</label>
                            <p class="control">
                                <input type="text" id="subject" class="input" v-model="subject">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="text" class="label" >Votre message (facultatif)</label>
                    <p class="control">
                        <textarea class="textarea" v-model="emailContents"></textarea>
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" >Aperçu en direct</label>
                    <qr :content="email"></qr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
