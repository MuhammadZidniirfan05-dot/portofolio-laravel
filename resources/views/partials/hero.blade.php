<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		@forelse($heroSlides as $slide)
			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third order-md-last img" style="background-image:url('{{ !empty($slide->image) ? asset('storage/' . $slide->image) : asset('images/bg_1.jpg') }}');">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								@if($slide->subheading)
									<span class="subheading">{{ $slide->subheading }}</span>
								@endif
								<h1 class="mb-4 mt-3">{!! $slide->title !!}</h1>
								@if($slide->subtitle)
									<p>{{ $slide->subtitle }}</p>
								@endif
								<p>
									<a href="#contact-section" class="btn btn-primary">Hire me</a>
									@if(!empty($globalProfile->cv_file))
										<a href="{{ asset('storage/' . $globalProfile->cv_file) }}" class="btn btn-primary btn-outline-primary" download>Download CV</a>
									@endif
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		@empty
			{{-- Fallback kalau belum ada slide diisi di admin --}}
			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end">
						<div class="one-third order-md-last img" style="background-image:url('{{ !empty($globalProfile->photo) ? asset('storage/' . $globalProfile->photo) : asset('images/bg_1.jpg') }}');">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex align-items-center ftco-animate">
							<div class="text">
								<span class="subheading">Hello! This is {{ $globalProfile->name ?? 'Saya' }}</span>
								<h1 class="mb-4 mt-3">{!! $globalSettings->hero_title ?? 'Selamat Datang di Portfolio Saya' !!}</h1>
								<p>{{ $globalSettings->hero_subtitle ?? '' }}</p>
								<p>
									<a href="#contact-section" class="btn btn-primary">Hire me</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforelse
	</div>
</section>
