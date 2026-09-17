<section class="ftco-section bg-light" id="projects-section">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Accomplishments</span>
				<h2 class="mb-4">Proyek Saya</h2>
			</div>
		</div>

		<div class="row">
			@forelse($projects as $project)
				<div class="col-md-6 col-lg-4 mb-4 d-flex ftco-animate">
					<div class="project-card w-100 h-100 d-flex flex-column bg-white rounded-lg shadow-sm">
						<div class="project-card-image"
							 style="background-image: url('{{ !empty($project->image) ? asset('storage/' . $project->image) : asset('images/work-1.jpg') }}');">
							@if($project->is_featured)
								<span class="project-badge-featured">Unggulan</span>
							@endif
						</div>

						<div class="p-4 d-flex flex-column flex-grow-1">
							@if(!empty($project->technologies) && is_array($project->technologies))
								<div class="project-tech mb-3">
									@foreach($project->technologies as $tech)
										<span class="badge-tech">{{ $tech }}</span>
									@endforeach
								</div>
							@endif

							<h3 class="project-title mb-2">{{ $project->title }}</h3>

							<p class="project-desc mb-4">
								{{ $project->description }}
							</p>

							<div class="project-actions mt-auto d-flex gap-2">
								@if(!empty($project->demo_url))
									<a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn btn-primary btn-sm project-btn">
										<span class="fa fa-external-link mr-1"></span> Demo
									</a>
								@endif
								@if(!empty($project->github_url))
									<a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn btn-outline-dark btn-sm project-btn">
										<span class="fa fa-github mr-1"></span> GitHub
									</a>
								@endif
								@if(empty($project->demo_url) && empty($project->github_url))
									<span class="text-muted small">Link belum tersedia</span>
								@endif
							</div>
						</div>
					</div>
				</div>
			@empty
				<div class="col-12 text-center">
					<p>Belum ada project. Tambahkan lewat panel admin.</p>
				</div>
			@endforelse
		</div>
	</div>
</section>