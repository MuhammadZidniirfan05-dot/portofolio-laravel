<section class="ftco-counter img bg-light" id="section-counter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-suitcase"></span>
					</div>
					<div class="text">
						<strong class="number" data-number="{{ $projects->count() }}">0</strong>
						<span>{{ $globalSettings->counter_label_1 ?? 'Project Selesai' }}</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-loyalty"></span>
					</div>
					<div class="text">
						<strong class="number" data-number="{{ $skills->count() }}">0</strong>
						<span>{{ $globalSettings->counter_label_2 ?? 'Skill Dikuasai' }}</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-coffee"></span>
					</div>
					<div class="text">
						<strong class="number" data-number="{{ $experiences->count() }}">0</strong>
						<span>{{ $globalSettings->counter_label_3 ?? 'Pengalaman Kerja' }}</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-calendar"></span>
					</div>
					<div class="text">
						<strong class="number" data-number="{{ $yearsExperience }}">0</strong>
						<span>{{ $globalSettings->counter_label_4 ?? 'Tahun Pengalaman' }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>