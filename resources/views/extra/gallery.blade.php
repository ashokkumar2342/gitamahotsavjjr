@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<style type="text/css">
	.gallery-img-wrap {
    height: 200px;
    width: 330px;
    box-sizing: content-box;
    overflow: hidden;
    margin: 20px;
}
</style>
<div class="banner">
	<div class="owl-four owl-carousel">
		<img src="{{ asset('images/img/banner.jpg')}}" alt="Image of Bannner">
	</div>
	<div class="container">
		<h1>welcome to education pro</h1>
		<h3>With our advance search feature you can now find the trips for you...</h3>
	</div>
	 <div id="owl-four-nav" class="owl-nav"></div>
</div>
<section class="page-heading">
	<div class="container">
		<h2>Gallery</h2>
	</div>
</section>
			<div class="container" style="text-align: center;">
				<section class="gallery-images-section gallery2" id="cGrid" style="text-align: center;">
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/1.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/1.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/2.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/2.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/3.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/3.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/4.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/4.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/5.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/5.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/12.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/12.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/7.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/7.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/8.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/8.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/10.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/10.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/9.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/9.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/11.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/11.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/6.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/6.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/new_img/13.jpeg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/new_img/13.jpeg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/p27.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p27.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item business" data-category="business">
						<a href="{{ asset('images/img/p28.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p28.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item design" data-category="design">
						<a href="{{ asset('images/img/p29.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p29.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item design" data-category="design">
						<a href="{{ asset('images/img/p30.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p30.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item development" data-category="development">
						<a href="{{ asset('images/img/p31.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p31.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item design" data-category="design">
						<a href="{{ asset('images/img/p32.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p32.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item seo" data-category="seo">
						<a href="{{ asset('images/img/p33.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p33.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item marketing" data-category="marketing">
						<a href="{{ asset('images/img/p34.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/p34.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item seo" data-category="seo">
						<a href="{{ asset('images/img/ph1.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/ph1.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item seo" data-category="seo">
						<a href="{{ asset('images/img/ph2.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/ph2.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item seo" data-category="seo">
						<a href="{{ asset('images/img/ph3.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/ph3.jpg') }}" alt="gallery-images">
						</a>
					</div>
					<div class="gallery-img-wrap grid-item seo" data-category="seo">
						<a href="{{ asset('images/img/ph4.jpg') }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
							<img src="{{ asset('images/img/ph4.jpg') }}" alt="gallery-images">
						</a>
					</div>
			</div>
				<!-- End of gallery Images -->				
		</section>

{{-- <section class="map-section">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.5733087899557!2d85.31323458697706!3d27.730457718152763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1920ba20a0d5%3A0x3ea7459e8ab1371f!2sSpyders+Lab!5e0!3m2!1sen!2snp!4v1547705422844" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</section> --}}
@endsection

		