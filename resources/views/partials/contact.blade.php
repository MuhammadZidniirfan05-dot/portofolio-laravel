<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Contact us</span>
				<h2 class="mb-4">Punya Proyek?</h2>
			</div>
		</div>

		<div class="row block-9">
			<div class="col-md-8">

				@if(session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
				@endif

				<form method="POST" action="{{ route('contact.store') }}" class="bg-light p-4 p-md-5 contact-form">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Anda" required>
								@error('name') <small class="text-danger">{{ $message }}</small> @enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Anda" required>
								@error('email') <small class="text-danger">{{ $message }}</small> @enderror
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subjek">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message" cols="30" rows="7" class="form-control" placeholder="Pesan" required>{{ old('message') }}</textarea>
								@error('message') <small class="text-danger">{{ $message }}</small> @enderror
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
							</div>
						</div>
					</div>
				</form>

			</div>

			<div class="col-md-4 d-flex flex-column pl-md-5">

				@if(!empty($globalProfile->email))
					<div class="contact-email-card text-center mb-4">
						<div class="contact-email-icon d-flex align-items-center justify-content-center mx-auto mb-3">
							<span class="fa fa-paper-plane"></span>
						</div>
						<p class="mb-1 text-muted small text-uppercase" style="letter-spacing: 1px;">Email</p>
						<a href="mailto:{{ $globalProfile->email }}" class="contact-email-link">{{ $globalProfile->email }}</a>
					</div>
				@endif

				@php
					$whatsappNumber = '082314479004'; // TODO: pindahkan ke DB kalau sudah ada field-nya
				@endphp

				@if(!empty($whatsappNumber))
					<div class="contact-email-card contact-whatsapp-card text-center mb-4">
						<div class="contact-email-icon contact-whatsapp-icon d-flex align-items-center justify-content-center mx-auto mb-3">
							<span class="fa fa-whatsapp"></span>
						</div>
						<p class="mb-1 text-muted small text-uppercase" style="letter-spacing: 1px;">WhatsApp</p>
						<a href="https://wa.me/62{{ ltrim(preg_replace('/\D/', '', $whatsappNumber), '0') }}"
						   target="_blank" rel="noopener" class="contact-email-link">
							{{ $whatsappNumber }}
						</a>
					</div>
				@endif

				@if($socialLinks->count() > 0)
					<div class="text-center mt-3">
						{{-- <p class="mb-3 text-muted small text-uppercase" style="letter-spacing: 1px;">Atau Hubungi via</p> --}}
						<ul class="ftco-footer-social list-unstyled d-flex justify-content-center">
							@foreach($socialLinks as $link)
								<li class="ftco-animate"><a href="{{ $link->url }}" target="_blank" rel="noopener">
									<span class="{{ $link->display_icon }}"></span>
								</a></li>
							@endforeach
						</ul>
					</div>
				@endif

			</div>
		</div>
	</div>
</section>