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
                            <label for="ssid" class="label" >Network name (SSID)</label>
                            <p class="control">
                                <input type="text" id="ssid" class="input" v-model="ssid">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="encryption" class="label" >Encryption method</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select id="encryption" v-model="wifiEncryption">
                                        <option value="WPA">WPA</option>
                                        <option value="WEP">WEP</option>
                                        <option value="nopass">Unencrypted</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="coumns">
                    <div class="field">
                        <label for="password"  class="label">Password</label>
                        <p class="control">
                            <input class="input" :disabled="this.wifiEncryption == 'nopass'" type="password" id="password" v-model="wifiPass"> 
                        </p>
                        <br>
                        <p class="control">
                            <label class="checkbox">
                                <input type="checkbox" v-model="wifiHidden">
                                Wifi network is hidden on unencrypted
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label" >Aperçu en direct</label>
                    <qr :content="wifi"></qr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
