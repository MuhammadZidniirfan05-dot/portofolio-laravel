<!DOCTYPE html>
<html lang="id">
<head>
	<title>{{ $globalSettings->site_title ?? 'Portfolio' }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	@if(!empty($globalSettings->favicon))
		<link rel="icon" href="{{ asset('storage/' . $globalSettings->favicon) }}">
	@endif

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/mobile-fixes.css') }}">

	{{-- Warna dinamis dari Site Settings (admin panel) --}}
	<style>
		:root {
			--primary-color: {{ $globalSettings->primary_color ?? '#b1b493' }};
			--secondary-color: {{ $globalSettings->secondary_color ?? '#a0f669' }};
			--text-color: {{ $globalSettings->text_color ?? '#000000' }};
		}
	</style>

	@stack('styles')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	@include('partials.nav')

	@yield('content')

	@include('partials.footer')

	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
	<script src="{{ asset('js/scrollax.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	<script>
		// Sinkronisasi foto hero mobile (#hero-bg-mobile) dengan slide
		// yang sedang aktif di carousel, supaya foto selalu full-bleed
		// tanpa bergantung ke perhitungan lebar Owl Carousel.
		(function () {
			function syncHeroBg() {
				var $bgLayer = jQuery('#hero-bg-mobile');
				if ($bgLayer.length === 0) return;

				jQuery('.home-slider').on('changed.owl.carousel translated.owl.carousel', function (e) {
					var current = e.item ? e.item.index : 0;
					var $activeSlide = jQuery(this).find('.owl-item.active .slider-item').first();

					if ($activeSlide.length === 0) {
						$activeSlide = jQuery(this).find('.slider-item').eq(current);
					}

					var bgUrl = $activeSlide.attr('data-slide-bg');
					if (bgUrl) {
						$bgLayer.css('background-image', 'url(' + bgUrl + ')');
					}
				});
			}

			if (typeof jQuery !== 'undefined') {
				jQuery(document).ready(syncHeroBg);
			}
		})();
	</script>

	@stack('scripts')
</body>
</html>