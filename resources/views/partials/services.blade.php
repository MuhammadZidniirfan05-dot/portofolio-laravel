<section class="ftco-section" id="services-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">I am great at</span>
				<h2 class="mb-4">Layanan yang Saya Tawarkan</h2>
			</div>
		</div>

		<div class="row">
			@forelse($services as $service)
				<div class="col-md-6 col-lg-3 mb-4 d-flex ftco-animate">
					<div class="media block-6 services d-block bg-white rounded-lg shadow w-100 h-100 d-flex flex-column">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="{{ $service->icon ?: 'flaticon-computer' }}"></span>
						</div>
						<div class="media-body flex-grow-1 d-flex flex-column">
							<h3 class="heading mb-3 service-title">{{ $service->title }}</h3>
							<p class="service-desc">{{ $service->description }}</p>
						</div>
					</div>
				</div>
			@empty
				<div class="col-12 text-center">
					<p>Belum ada layanan ditambahkan. Isi lewat panel admin.</p>
				</div>
			@endforelse
		</div>
	</div>
</section>

<style>
	.cta-banner {
		position: relative;
		overflow: visible;
		padding-top: 24px;
		padding-bottom: 24px;
	}
	.cta-banner .cta-content h2 {
		font-size: 19px;
		margin-bottom: 8px;
		line-height: 1.3;
	}
	.cta-banner .cta-content p {
		font-size: 13px;
		margin-bottom: 14px;
		line-height: 1.5;
	}
	.cta-banner .cta-content .btn-cta {
		font-size: 13px;
		padding: 9px 20px;
		display: inline-block;
	}
	.cta-banner .cta-mobile-image img {
		max-height: 160px;
		width: auto;
		object-fit: contain;
	}

	@media (min-width: 576px) {
		.cta-banner .cta-content h2 {
			font-size: 22px;
		}
		.cta-banner .cta-content p {
			font-size: 14px;
		}
		.cta-banner .cta-mobile-image img {
			max-height: 200px;
		}
	}

	@media (min-width: 768px) {
		.cta-banner {
			padding-top: 28px;
			padding-bottom: 28px;
		}
		.cta-banner .cta-content h2 {
			font-size: 24px;
		}
		.cta-banner .cta-content p {
			font-size: 14px;
		}
		.cta-banner .cta-content .btn-cta {
			padding: 10px 24px;
		}
	}

	@media (min-width: 992px) {
		.cta-banner .cta-content h2 {
			font-size: 26px;
		}
	}
</style>

<section class="ftco-hireme cta-banner">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-md-8 col-lg-7 d-flex align-items-center">
				<div class="w-100 cta-content">
					<h2>{{ $globalSettings->cta_title ?? 'Punya proyek yang ingin dikerjakan?' }}</h2>
					<p>{{ $globalSettings->cta_subtitle ?? $globalProfile->short_description ?? 'Mari diskusikan kebutuhan proyek Anda.' }}</p>
					<p class="mb-0">
						<a href="#contact-section" class="btn btn-white btn-cta">{{ $globalSettings->cta_button_text ?? 'Hubungi Saya' }}</a>
					</p>
				</div>
			</div>
			<div class="col-md-4 col-lg-5 d-none d-md-block"></div>
		</div>
	</div>

	<div class="d-none d-md-flex" style="position: absolute; right: 4%; bottom: 0; height: 380px; align-items: flex-end; z-index: 2;">
		<img src="{{ !empty($globalSettings->cta_image) ? asset('storage/' . $globalSettings->cta_image) : asset('images/author.png') }}"
			 style="height: 100%; width: auto; max-width: 420px; object-fit: contain;"
			 alt="">
	</div>

	<div class="d-md-none text-center cta-mobile-image pb-3">
		<img src="{{ !empty($globalSettings->cta_image) ? asset('storage/' . $globalSettings->cta_image) : asset('images/author.png') }}"
			 alt="">
	</div>
</section>