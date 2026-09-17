<footer class="ftco-footer ftco-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-6">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Menu</h2>
					<ul class="list-unstyled">
						<li><a href="#home-section"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
						<li><a href="#about-section"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
						<li><a href="#experience-section"><span class="fa fa-chevron-right mr-2"></span>Experience</a></li>
						<li><a href="#skills-section"><span class="fa fa-chevron-right mr-2"></span>Skills</a></li>
						<li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
						<li><a href="#projects-section"><span class="fa fa-chevron-right mr-2"></span>Projects</a></li>
						<li><a href="#contact-section"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Kontak</h2>
					<div class="block-23 mb-3">
						<ul>
							@if(!empty($globalProfile->email))
								<li><a href="mailto:{{ $globalProfile->email }}"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">{{ $globalProfile->email }}</span></a></li>
							@endif
						</ul>
					</div>
					<ul class="ftco-footer-social list-unstyled mt-2">
						@forelse($socialLinks as $link)
							<li class="ftco-animate"><a href="{{ $link->url }}" target="_blank" rel="noopener">
								<span class="{{ $link->display_icon }}"></span>
							</a></li>
						@empty
						@endforelse
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p>{{ $globalSettings->footer_text ?? ('Copyright ©' . date('Y') . ' All rights reserved') }}</p>
			</div>
		</div>
	</div>
</footer>