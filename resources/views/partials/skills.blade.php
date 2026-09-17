<section class="ftco-section bg-light" id="skills-section">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Skills</span>
				<h2 class="mb-4">My Skills</h2>
			</div>
		</div>
		<div class="row progress-circle mb-5">
			@forelse($skills as $skill)
				<div class="col-lg-4 mb-4">
					<div class="bg-white rounded-lg shadow p-4">
						<h2 class="h5 font-weight-bold text-center mb-4">{{ $skill->name }}</h2>

						<div class="progress mx-auto" data-value='{{ $skill->level }}'>
							<span class="progress-left">
								<span class="progress-bar border-primary"></span>
							</span>
							<span class="progress-right">
								<span class="progress-bar border-primary"></span>
							</span>
							<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
								<div class="h2 font-weight-bold">{{ $skill->level }}<sup class="small">%</sup></div>
							</div>
						</div>
					</div>
				</div>
			@empty
				<div class="col-12 text-center">
					<p>Belum ada data skill. Tambahkan lewat panel admin.</p>
				</div>
			@endforelse
		</div>
	</div>
</section>
