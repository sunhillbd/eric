
@extends('frontend.layouts.master')

@section('title','ESE Law')

@section('header')
	@include('frontend.partials.header')
@endsection

@section('content')

		<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">

			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark" style="background-image: url('images/slider/swiper/background.png');">
						<div class="video-overlay" style="background-color:rgba(0,0,0,0.5); z-index: 1;"></div>
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center" style="z-index: 2;">
									<h2 data-caption-animate="fadeInUp">O1 Visas Made Simple</h2>
									<p data-caption-animate="fadeInUp" data-caption-delay="200">Full application document preparation and mentorship available now</p><br>
									<a href="{{ route('register') }}" data-caption-animate="fadeInUp" data-caption-delay="300" class="button button-border button-rounded button-light button-medium">Start visa process</a>
								</div>
							</div>
						</div>
					</div>
<!-- 					<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div id="slider-arrow-right"><i class="icon-angle-right"></i></div> -->
				</div>

			</div>

		</section>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="section nobottommargin notopmargin">
				<div class="container clear-bottommargin clearfix">

					<div class="row">
						<div class="col-md-12">
							<h1 class="center" style="text-transform: uppercase;">How it works</h1>
						</div>
					</div>

					<div class="row topmargin-sm clearfix">

						<div class="col-md-4 bottommargin">
							<i class="i-plain color i-large icon-search inline-block" style="margin-bottom: 15px;"></i>
							<div class="heading-block nobottomborder" style="margin-bottom: 15px;">
								<h4>Evaluate your case</h4>
							</div>
							<p>Answer just a few questions to find out if you’re qualified for an O1 visa. Our attorney will evaluate your case thorougly before giving you feedback.</p>
						</div>

						<div class="col-md-4 bottommargin">
							<i class="i-plain color i-large icon-chat inline-block" style="margin-bottom: 15px;"></i>
							<div class="heading-block nobottomborder" style="margin-bottom: 15px;">
								<h4>Get mentorship</h4>
							</div>
							<p>Based on the stage of your career, get the appropriate mentorship from a qualified attorney to prepare for your O1 visa application.</p>
						</div>

						<div class="col-md-4 bottommargin">
							<i class="i-plain color i-large icon-lock inline-block" style="margin-bottom: 15px;"></i>
							<div class="heading-block nobottomborder" style="margin-bottom: 15px;">
								<h4>Stay protected</h4>
							</div>
							<p>Stay up to date with the latest immigration news and information. Your attorney will be in direct contact with you to answer your questions.</p>
						</div>

					</div>

				</div>
			</div>

		</section>

		<section id="section-testimonials" class="page-section parallax" style="background-image: url('images/testimonial.png'); padding: 200px 0; position: relative; background-size: cover;" data-stellar-background-ratio=".3">

			<div class="video-overlay" style="background-color:rgba(0,0,0,0.5); z-index: 1;"> </div>

				<div class="container clearfix">

					<div class="col_half nobottommargin col_last dark" style="z-index: 2;">

						<div class="heading-block left">
							<h4>What Employers Say?</h4>
							<span>Our clients love our creatives &amp; so we do!</span>
						</div>

						<div class="fslider testimonial testimonial-full nobgcolor noborder noshadow nopadding" data-arrows="false">
							<div class="flexslider">
								<div class="slider-wrap">
									<div class="slide">
										<div class="testi-content">
											<p> I have just never experienced an easier way to reach so many great designers at the same time. Designity is a great community for hiring talented creatives.</p>
											<div class="testi-meta">
												David Rostamo
												<span>Director of HR</span>
											</div>
										</div>
									</div>
									<div class="slide">
										<div class="testi-content">
											<p> As always, Designity has done an outstanding job in helping get the graphics I need. The system works perfectly, the customer service is excellent. Thank you. </p>
											<div class="testi-meta">
												Pedro Kolnash
												<span>CEO & Founder</span>
											</div>
										</div>
									</div>
									<div class="slide">
										<div class="testi-content">
											<p> This website was beautifully created to meet all our design needs!</p>
											<div class="testi-meta">
												George J Mirko
												<span>Talent acquisition</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
		


		</section>
		<!-- #content end -->

	@include('frontend.partials.login-modal')
@endsection
