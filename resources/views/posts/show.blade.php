@extends('layouts.frontend')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ !empty($post->featured_image) ? asset('storage/' . $post->featured_image) : asset('images/bg_4.jpg') }}');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<p class="breadcrumbs">
					<span class="mr-2"><a href="{{ url('/') }}">Home <i class="fa fa-chevron-right"></i></a></span>
					<span class="mr-2"><a href="{{ url('/') }}#blog-section">Blog <i class="fa fa-chevron-right"></i></a></span>
					<span>{{ $post->title }}</span>
				</p>
				<h1 class="mb-0 bread">{{ $post->title }}</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 ftco-animate">
				<p class="text-muted">
					Dipublikasikan {{ optional($post->published_at)->format('d M Y') }} &middot; {{ $post->views }}x dilihat
				</p>

				<div class="post-content">
					{!! $post->content !!}
				</div>
			</div>

			<div class="col-lg-4 sidebar ftco-animate">
				<div class="sidebar-box ftco-animate">
					<h3 class="heading-sidebar">Artikel Lainnya</h3>
					@forelse($latestPosts as $latest)
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url('{{ !empty($latest->featured_image) ? asset('storage/' . $latest->featured_image) : asset('images/image_1.jpg') }}');"
							   href="{{ route('posts.show', $latest->slug) }}"></a>
							<div class="text">
								<h3 class="heading"><a href="{{ route('posts.show', $latest->slug) }}">{{ $latest->title }}</a></h3>
								<div class="meta">
									<div><span class="icon-calendar"></span> {{ optional($latest->published_at)->format('d M Y') }}</div>
								</div>
							</div>
						</div>
					@empty
						<p class="text-muted">Belum ada artikel lain.</p>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
