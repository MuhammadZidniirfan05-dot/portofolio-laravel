<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
	<div class="container">
		<div class="row d-flex no-gutters">
			<div class="col-md-6 col-lg-5 d-flex">
				<div class="img-about img d-flex align-items-stretch">
					<div class="overlay"></div>
					<div class="img d-flex align-self-stretch align-items-center" style="background-image:url('{{ !empty($globalProfile->about_photo) ? asset('storage/' . $globalProfile->about_photo) : (!empty($globalProfile->photo) ? asset('storage/' . $globalProfile->photo) : asset('images/about-1.jpg')) }}');">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
				<div class="py-md-5">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section ftco-animate">
							<span class="subheading">My Intro</span>
							<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">About Me</h2>
							<p class="about-description">{{ $globalProfile->short_description ?? '' }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>