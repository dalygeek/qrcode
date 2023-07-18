<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LAQRBOX</title>

    {{-- OpenGraph --}}
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="Thor Qr codes Generator">
    <meta property="og:image" content="https://i.ibb.co/nMKspvN/250969815-611508013209940-2579603578630400935-n.png">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="fb:app_id" content="{{ env('APP_ID') }}">

    @include('partials.favicon')

    @include('partials.seo')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
{{-- <!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> --}}

<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'url' => env('APP_URL')
        ]) !!};
    </script>
    <style>
        .loginBtn {
    box-sizing: border-box;
    position: relative;
    /* width: 13em;  - apply for fixed size */
    margin: 0.2em;
    
    padding: 0 15px 0 46px;
    border: none;
    text-align: left;
    line-height: 34px;
    white-space: nowrap;
    border-radius: 0.2em;
    font-size: 16px;
    
    
  }
  .loginBtn:before {
    content: "";
    box-sizing: border-box;
    position: absolute;
    top: 0;
    left: 0;
    width: 34px;
    height: 100%;
  }
  .loginBtn:focus {
    outline: none;
  }
  .loginBtn:active {
    box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
  }
  
  
  /* Facebook */
  .loginBtn--facebook {
    background-color: #4C69BA;
    background-image: linear-gradient(#4C69BA, #3B55A0);
    /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
    text-shadow: 0 -1px 0 #354C8C;
  }
  .loginBtn--facebook:before {
    border-right: #364e92 1px solid;
    background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
  }
  .loginBtn--facebook:hover,
  .loginBtn--facebook:focus {
    background-color: #5B7BD5;
    background-image: linear-gradient(#5B7BD5, #4864B1);
  }
  
  
  /* Google */
  .loginBtn--google {
    /*font-family: "Roboto", Roboto, arial, sans-serif;*/
    background: #DD4B39;
  }
  .loginBtn--google:before {
    border-right: #BB3F30 1px solid;
    background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
  }
  .loginBtn--google:hover,
  .loginBtn--google:focus {
    background: #E74B37;
  }


  .bg-custom-2 {
background-image: linear-gradient(15deg, #0450d7 0%, #0450d7 100%);
}
.is-one-third{
			padding: 4rem 5rem;
		}
		.spacer{
			height: 40px;
		}
		.plan_title{
			margin-bottom: 0 !important;
		}
		.plan_subtitle{
			color: #90A4AE;
		}
		.price{
			margin-top: 40px;
		}
		.price h2{
			color: #00C4A7;
		}
		.price span{
			font-size: 20px; 
		}
		.unavailable{
			text-decoration:line-through;
			color: #90A4AE;
		}
		.best_selling{
			background: #003049;
		}
		.best_selling h2{
			color: #F77F00;
		}
		.best_selling_btn{
			background: #f77f00 !important;
		}

    </style>




<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101312590);</script>
<script async src="//static.getclicky.com/js"></script>


<!-- Default Statcounter code for QR Code http://135.125.100.166 -->
<script type="text/javascript">
var sc_project=12517942; 
var sc_invisible=1; 
var sc_security="db131059"; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js" async></script>
<noscript><div class="statcounter"><a title="Web Analytics"
href="https://statcounter.com/" target="_blank"><img class="statcounter"
src="https://c.statcounter.com/12517942/0/db131059/1/" alt="Web
Analytics"></a></div></noscript>
<!-- End of Statcounter Code -->



<!-- Start of Woopra Code -->
<script>
  (function(){
    var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/w.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
  })("woopra");

  woopra.config({
      domain: 'vps-9cbb23login95.vps.ovh.net'
  });
  woopra.track();
</script>
<!-- End of Woopra Code -->


<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://thor.matomo.cloud/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src='//cdn.matomo.cloud/thor.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

</head>
<body style="font-family: 'Cairo';" >
    <div id="app">
    <nav class="nav pl  " style=" height:100px"  >
        <div class="nav-left"  >
            <a href="/login"  class="nav-item is-brand " style="margin-left: 80px;margin-top:40px" >
                
                <a href="/login"    style="margin-top:20px;margin-left:-40px"><img  src="{{asset('images/qrbox.png')}}"  width="180px"   alt="{{ config('app.name') }}"></a> &nbsp; &nbsp;
                <!--<a href="/" class="nav-qr"  style="margin-top:32px;color:rgb(0, 0, 0);font-family:Verdana, Geneva, Tahoma, sans-serif;">LAQRBOX</a>!-->
            </a>
           <div class="" style="font-family: Verdana, Geneva, Tahoma, sans-serif"></div>
        </div>
        <br>
        <span class="nav-toggle" @click="mobileNav = ! mobileNav" :class="{ 'is-active' : mobileNav }">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class="nav-right nav-menu " style="margin-right: 80px" :class="{ 'is-active' : mobileNav }">
            <a href="{{ url('about') }}" class="nav-item about" style="color: black" >A propos</a>
            <a href="{{ url('pricing') }}" class="nav-item about" style="color: black" >Tarifs</a>
            @if (Auth::guest())
                <div class="nav-item" >
                    {{-- <img src="images/gg.jpg" alt=""> --}}
                    <a href="{{ url('login') }}" class="button " style="background-color:#0450d7; color:white"> Se connecter</a>&nbsp;
                    <a href="{{ url('register') }}" class="button " style="background-color:#00c576; color:white"> S'inscrire</a> 
                    {{-- <a href="{{ route('googleauth') }}" class="" style="background-color:#D6492E;color:white"><b> Google Login</b></a> --}}
                </div>
            @else
            <form id="sign-out" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
             <a href="{{ url('/profile') }}" class="nav-item" style="color: black">
                Profil
            </a> 
            @if(Auth::user()['role'] == 7 )
            <a href="{{ route('showListeUsers') }}" class="nav-item">
               <p class="button is-success"> Dashboard </p> 
            </a>
            @endif
            <a style="color: black" class="nav-item" @click.prevent="signOut">
               
Déconnexion
            </a>
            @endif
        </div>
    </nav>
        <div>
        @yield('content')
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<script>

    function ValidateSize(file) {
            var FileSize = file.files[0].size / 1024 / 1024; // in MiB
            // if (FileSize > 2) {
            //     // alert('File size exceeds 3 MiB');
            //     // this.value = "";
            // // $(file).val(''); //for clearing with Jquery
            // } else {

            // }
        }


    var qr;
    (function() {
        qr = new QRious({
            element: document.getElementById('qr-code'),
            size: 200,
            value: document.getElementById("qr-text").value
        });
    })();

    function generateQRCode() {
        var qrtext = document.getElementById("qr-text").value;
        document.getElementById("qr-result").innerHTML = "Votre QR code :";
       
        qr.set({
            foreground: 'black',
            size: 200,
            value: qrtext
        });
    }
</script>
    @include('sweet::alert')
    @include('partials.footer')
</body>
</html>
