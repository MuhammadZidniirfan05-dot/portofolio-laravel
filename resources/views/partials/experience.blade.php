<section class="ftco-section bg-light" id="experience-section">
	<div class="container">
		<div class="row justify-content-center pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Resume</span>
				<h2 class="mb-4">Pengalaman Kerja</h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-9">
				<div class="exp-timeline">
					@forelse($experiences as $exp)
						<div class="exp-timeline-item">
							<div class="exp-timeline-dot"></div>
							<div class="exp-timeline-content">
								<span class="exp-period">
									{{ $exp->start_date->format('M Y') }} &mdash; {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}
								</span>
								<h3>{{ $exp->position }}</h3>
								<h4>{{ $exp->company }}</h4>
								@if($exp->description)
									<p>{{ $exp->description }}</p>
								@endif
							</div>
						</div>
					@empty
						<div class="text-center">
							<p>Belum ada riwayat pengalaman kerja. Tambahkan lewat panel admin.</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</section>