<section class="ftco-section testimony-section bg-primary">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
				<span class="subheading">Testimonies</span>
				<h2 class="mb-4">Apa Kata Klien?</h2>
			</div>
		</div>

		@if($testimonials->count() > 0)
			<div class="row ftco-animate">
				<div class="col-md-12">
					<div class="carousel-testimony owl-carousel">
						@foreach($testimonials as $t)
							<div class="item">
								<div class="testimony-wrap py-4">
									<div class="text">
										<span class="fa fa-quote-left"></span>
										<p class="mb-4 pl-5">{{ $t->message }}</p>
										<div class="d-flex align-items-center">
											<div class="user-img" style="background-image: url('{{ !empty($t->photo) ? asset('storage/' . $t->photo) : asset('images/person_1.jpg') }}')"></div>
											<div class="pl-3">
												<p class="name">{{ $t->name }}</p>
												@if($t->position)
													<span class="position">{{ $t->position }}</span>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@else
			<div class="row justify-content-center">
				<div class="col-md-8 text-center heading-section-white">
					<p>Belum ada testimoni. Jadilah yang pertama mengisi di bawah ini!</p>
				</div>
			</div>
		@endif

		{{-- Form untuk klien mengisi testimoni sendiri --}}
		<div class="row justify-content-center mt-5 pt-4">
			<div class="col-md-7">
				<div class="bg-white rounded-lg shadow p-4 p-md-5">
					<h3 class="mb-4 text-center" style="color:#000;">Bagikan Pengalaman Anda</h3>

					@if(session('testimony_success'))
						<div class="alert alert-success">{{ session('testimony_success') }}</div>
					@endif

					<form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Anda" required>
							@error('name') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
						<div class="form-group">
							<input type="text" name="position" value="{{ old('position') }}" class="form-control" placeholder="Posisi / Perusahaan (opsional)">
						</div>
						<div class="form-group">
							<textarea name="message" rows="4" class="form-control" placeholder="Bagaimana pengalaman Anda bekerja sama?" required>{{ old('message') }}</textarea>
							@error('message') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
						<div class="form-group">
							<label class="d-block" style="color:#000;">Foto (opsional)</label>
							<input type="file" name="photo" class="form-control-file">
							@error('photo') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
						<div class="form-group mb-0 text-center">
							<input type="submit" value="Kirim Testimoni" class="btn btn-primary py-3 px-5">
						</div>
						<p class="text-center text-muted mt-3 mb-0" style="font-size: 0.85rem;">
							Testimoni akan tampil setelah ditinjau oleh admin.
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
