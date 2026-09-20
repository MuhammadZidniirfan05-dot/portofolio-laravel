<section class="ftco-section bg-light" id="skills-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Skills</span>
				<h2 class="mb-4">My Skills</h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="skills-grid-v5">
					@forelse($skills as $index => $skill)
						<div class="skill-card5 skill-scheme-{{ ($index % 2) + 1 }}">
							<div class="skill-card5-icon">
								@if(!empty($skill->icon))
									<img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}">
								@else
									<i class="fa {{ $skill->icon_glyph }}"></i>
								@endif
							</div>
							<div class="skill-card5-name">{{ $skill->name }}</div>
						</div>
					@empty
						<div class="text-center w-100">
							<p>Belum ada data skill. Tambahkan lewat panel admin.</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</section>