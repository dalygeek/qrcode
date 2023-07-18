@extends('layouts.app')

@section('content')

@include('partials.bulma-header')

<section class="section">
	<div class="container">
		<h3 class="title is-1 has-text-centered has-text-weight-bold">
        Forfaits et tarifs
		</h3>
		<div class="spacer"></div>




		<div class="has-text-centered">
			<!--<img style="border-raduis:50px" width="70px" src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Flag_of_Tunisia.svg" alt="">
			<img style="border-raduis:50px" width="70px" src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" alt="">
			<img style="border-raduis:50px" width="70px" src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Flag_of_the_United_States.svg" alt="">
		!--></div>

	

		
		<div class="spacer"></div>
		<div class="columns">
		
			<div class="column is-one-fourth has-text-centered best_selling" style="background-color:#0450d7">
				<h2 class="title is-3 plan_title has-text-white has-text-weight-bold">Pack 1</h2>
				<!--<p class="has-text-weight-light plan_subtitle" style="color:black">This is the best selling plan</p>!-->
				<div class="price">
					<h2 class="title is-2 has-text-weight-bold"> 5 euro<span class="has-text-weight-light">/mois</span></h2>
				</div>
				<div class="spacer"></div>
				<div class="features has-text-white">
                	<p>2 QR codes</p>
					<p>Scans illimité </p>
						
				</div>
				<div class="spacer"></div>
				@if (Auth::guest())
				<a class="button is-primary" href="{{ url('/register') }}">S'inscrire</a>
				@else
				<a class="button is-primary" href="https://www.paypal.com/us/signin" target="_blank">Acheter</a>
				@endif 
			</div>
			<div class="column is-one-fourth has-text-centered " >
				<h2 class="title is-3 plan_title has-text-weight-bold">Pack 2 </h2>
				<!--<p class="has-text-weight-light plan_subtitle" style="color:black">This is a quarterly plan</p>!-->
				<div class="price">
					<h2 class="title is-2 has-text-weight-bold"  style="color:black"> 54 euro<span class="has-text-weight-light">/mois</span></h2>
				</div>
				<div class="spacer"></div>
				<div class="features">
                    <p>20 codes dynamiques</p>
					<p>Scans illimité </p>
				
				
				</div>
				<div class="spacer"></div>
				@if (Auth::guest())
				<a class="button is-primary" href="{{ url('/register') }}">S'inscrire</a>
				@else
				<a class="button is-primary" href="https://www.paypal.com/us/signin" target="_blank">Acheter</a>
				@endif 
			</div>
			<div class="column is-one-fourth has-text-centered  " style="background-color:#00c576" >
				<h2 class="title is-3 plan_title has-text-weight-bold" >Pack 3  </h2>
				<!--<p class="has-text-weight-light plan_subtitle" style="color:black">This is a quarterly plan</p>!-->
				<div class="price">
					<h2 class="title is-2 has-text-weight-bold" style="color:white"> 84 Euro<span class="has-text-weight-light">/mois</span></h2>
				</div>
				<div class="spacer"></div>
				<div class="features">
                    <p>50 codes dynamiques</p>
					<p>Scans illimité </p>
				
				
				</div>
				<div class="spacer"></div>
				@if (Auth::guest())
				<a class="button is-primary" href="{{ url('/register') }}">S'inscrire</a>
				@else
				<a class="button is-primary" href="https://www.paypal.com/us/signin" target="_blank">Acheter</a>
				@endif 
			</div>
			<div class="column is-one-fourth has-text-centered has-background-white">
				<h2 class="title is-3 plan_title has-text-weight-bold">Pack 4</h2>
				<!--<p class="has-text-weight-light plan_subtitle" style="color:black">This is a quarterly plan</p>!-->
				<div class="price">
					<h2 class="title is-2 has-text-weight-bold">Sur Devis<span class="has-text-weight-light"></span></h2>
				</div>
				<div class="spacer"></div>
				<div class="features">
                    <p>100 codes dynamiques</p>
					<p>Scans illimité </p>
				
				
				</div>
				<div class="spacer"></div>
				@if (Auth::guest())
				<a class="button is-primary" href="{{ url('/register') }}">S'inscrire</a>
				@else
			 
				<a class="button is-primary" href="https://www.paypal.com/us/signin" target="_blank">Acheter</a>
				@endif 

			</div>
		</div>
	</div>
</section>
@endsection