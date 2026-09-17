@if($globalSettings->show_blog ?? false)
<section class="ftco-section bg-light" id="blog-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Blog</span>
				<h2 class="mb-4">Artikel Terbaru</h2>
			</div>
		</div>
		<div class="row d-flex">
			@forelse($posts as $post)
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
						<a href="{{ route('posts.show', $post->slug) }}" class="block-20" style="background-image: url('{{ !empty($post->featured_image) ? asset('storage/' . $post->featured_image) : asset('images/image_1.jpg') }}');">
						</a>
						<div class="text mt-3 float-right d-block">
							<div class="d-flex align-items-center mb-3 meta">
								<p class="mb-0">
									<span class="mr-2">{{ optional($post->published_at)->format('d M Y') }}</span>
								</p>
							</div>
							<h3 class="heading"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
							<p>{{ $post->excerpt }}</p>
						</div>
					</div>
				</div>
			@empty
				<div class="col-12 text-center">
					<p>Belum ada artikel yang dipublikasikan.</p>
				</div>
			@endforelse
		</div>
	</div>
</section>
@endif
