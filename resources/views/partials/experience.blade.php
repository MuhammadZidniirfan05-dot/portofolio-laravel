{{-- ============ SECTION EXPERIENCE ============ --}}
<section class="ftco-section bg-light" id="experience-section" style="padding-bottom: 30px;">
	<div class="container">
		<div class="row justify-content-center pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Resume</span>
				<h2 class="mb-4">Pengalaman Kerja</h2>
			</div>
		</div>

		<div class="exp-scroll-wrapper">
			<div class="exp-scroll">
				@forelse($experiences as $exp)
					<div class="exp-slide">
						<div class="exp-card">
							<span class="exp-period">
								{{ $exp->start_date->format('M Y') }} &mdash; {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}
							</span>
							<h3 class="exp-position">{{ $exp->position }}</h3>
							<h4 class="exp-company">{{ $exp->company }}</h4>
							@if($exp->description)
								<p class="exp-desc">{{ $exp->description }}</p>
							@endif
						</div>
					</div>
				@empty
					<div class="text-center w-100">
						<p>Belum ada riwayat pengalaman kerja.</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
</section>

{{-- ============ SECTION EXPERIENCE ============ --}}
<section class="ftco-section bg-light" id="experience-section">
	<div class="container">
		<div class="row justify-content-center pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Resume</span>
				<h2 class="mb-4">Pengalaman Kerja</h2>
			</div>
		</div>

		<div class="exp-scroll-wrapper">
			<div class="exp-scroll">
				@forelse($experiences as $exp)
					<div class="exp-slide">
						<div class="exp-card">
							<span class="exp-period">
								{{ $exp->start_date->format('M Y') }} &mdash; {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}
							</span>
							<h3 class="exp-position">{{ $exp->position }}</h3>
							<h4 class="exp-company">{{ $exp->company }}</h4>
							@if($exp->description)
								<p class="exp-desc">{{ $exp->description }}</p>
							@endif
						</div>
					</div>
				@empty
					<div class="text-center w-100">
						<p>Belum ada riwayat pengalaman kerja.</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
</section>

<style>
	/* ============================================================
	   EXPERIENCE SECTION
	   ============================================================ */

	/* ---------- DESKTOP (default) ---------- */
	.exp-scroll-wrapper {
		overflow-x: auto;
		overflow-y: hidden;
		padding: 10px 0 20px;
		scroll-snap-type: x mandatory;
		-webkit-overflow-scrolling: touch;
		display: flex;
		justify-content: center;
	}
	.exp-scroll-wrapper::-webkit-scrollbar { height: 6px; }
	.exp-scroll-wrapper::-webkit-scrollbar-thumb {
		background: #cbd5e1;
		border-radius: 999px;
	}
	.exp-scroll {
		display: flex;
		gap: 16px;
		padding: 0 10px;
		justify-content: center;
		max-width: 1100px;
		margin: 0 auto;
	}
	.exp-slide {
		flex: 0 0 85%;
		scroll-snap-align: center;
	}
	.exp-card {
		background: #fff;
		border-radius: 16px;
		padding: 22px;
		border-top: 4px solid #f0b429;
		box-shadow: 0 8px 24px -12px rgba(0, 0, 0, 0.08);
		height: 100%;
		text-align: center;
		overflow-wrap: break-word;
		word-wrap: break-word;
	}
	.exp-period {
		font-size: 11px;
		font-weight: 700;
		letter-spacing: .06em;
		color: #1f6f8b;
		background: #e6f3f8;
		padding: 4px 10px;
		border-radius: 999px;
		display: inline-block;
		margin-bottom: 10px;
	}
	.exp-position {
		font-size: 1.05rem;
		font-weight: 800;
		color: #f0b429;
		margin: 6px 0 4px;
		overflow-wrap: break-word;
		word-wrap: break-word;
		line-height: 1.3;
	}
	.exp-company {
		font-size: .82rem;
		font-weight: 600;
		color: #1f6f8b;
		margin-bottom: 10px;
		overflow-wrap: break-word;
		word-wrap: break-word;
		line-height: 1.4;
	}
	.exp-desc {
		font-size: .82rem;
		color: #6b7280;
		line-height: 1.55;
		margin: 0;
		overflow-wrap: break-word;
		word-wrap: break-word;
	}

	/* ---------- TABLET (>= 768px) ---------- */
	@media (min-width: 768px) {
		.exp-slide { flex: 0 0 45%; }
	}

	/* ---------- DESKTOP (>= 992px) ---------- */
	@media (min-width: 992px) {
		.exp-slide { flex: 0 0 32%; }
	}

	/* ============================================================
	   HP (< 768px): TUMPUKAN VERTIKAL - PAKSA
	   ============================================================ */
	@media (max-width: 767px) {

		/* --- 1. Paksa padding section jadi kecil --- */
		section#experience-section.ftco-section {
			padding-top: 20px !important;
			padding-bottom: 10px !important;
			margin-top: 0 !important;
			margin-bottom: 0 !important;
		}
		section#experience-section .container {
			padding-left: 15px !important;
			padding-right: 15px !important;
			padding-top: 0 !important;
			padding-bottom: 0 !important;
		}
		section#experience-section .row {
			margin-left: 0 !important;
			margin-right: 0 !important;
		}
		section#experience-section .pb-3 {
			padding-bottom: 5px !important;
		}
		section#experience-section .heading-section {
			margin-bottom: 0 !important;
			padding-bottom: 0 !important;
		}
		section#experience-section .heading-section h2 {
			margin-bottom: 5px !important;
		}
		section#experience-section .subheading {
			margin-bottom: 0 !important;
		}

		/* --- 2. Matikan horizontal scroll, ganti jadi vertikal --- */
		.exp-scroll-wrapper {
			display: block !important;
			overflow: visible !important;
			padding: 0 !important;
			scroll-snap-type: none !important;
		}
		.exp-scroll {
			display: flex !important;
			flex-direction: column !important;
			gap: 12px !important;
			padding: 0 !important;
			max-width: 100% !important;
			margin: 0 !important;
			justify-content: flex-start !important;
		}
		.exp-slide {
			flex: 0 0 100% !important;
			width: 100% !important;
			max-width: 100% !important;
			scroll-snap-align: none !important;
		}
		.exp-card {
			height: auto !important;
			padding: 16px !important;
			border-radius: 12px !important;
		}
		.exp-period {
			font-size: 10px !important;
			padding: 3px 8px !important;
		}
		.exp-position { font-size: .95rem !important; }
		.exp-company  { font-size: .78rem !important; }
		.exp-desc     { font-size: .78rem !important; line-height: 1.5 !important; }
	}
</style>