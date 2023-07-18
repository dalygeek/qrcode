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
                        <label class="label" for="latitude" >Latitude</label>
                        <div class="field">
                            <p class="control">
                                <input type="number" class="input" id="latitude" v-model="latitude"></input>
                            </p>
                        </div>
                    </div>

                    <div class="column">
                        <label class="label" for="longitude" >Longitude</label>
                        <div class="field">
                            <p class="control">
                                <input type="number" id="longitude" class="input" v-model="longitude">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" >Aperçu en direct</label>
                    <qr :content="location"></qr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
