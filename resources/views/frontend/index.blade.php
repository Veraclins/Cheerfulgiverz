@extends('layouts.frontend.master')
@section('content')
            
            <!-- MAIN BANNER -->
            <section class="cd-hero">
				<ul class="cd-hero-slider autoplay">
					<li class="selected">
						<div class="cd-full-width">
							<div class="container">
								<h2>GIVE AND IT SHALL <br>BE GIVEN <span class="color-default" style="text-transform:uppercase">UNTO YOU</span></h2>
								<p>A FULL MEASURE PRESSED DOWN AND RUNNING OVER!!! </p>
								<a href="{{url('about')}}" class="btn btn-primary" data-text="read more">read more</a>
								<a href="{{url('contact')}}" class="btn btn-default" data-text="Contact Us">Contact Us</a>
							</div>
						</div>
					</li>

					<li>
						<div class="cd-full-width">
							<div class="container">
								<h2>GIVE TO ONE AND <span class="color-default">RECEIVE FROM TWO</span></h2>
								<p>That is, two times of your donation in 2 – 14 days.</p>
								<a href="contact-us.html" class="btn btn-default" data-text="contact us today">contact us today</a>
							</div>
						</div>
					</li>

					<li>
						<div class="cd-full-width">
							<div class="container text-center">
								<h2 class="color-white">Experience is Everything</h2>
								<p class="color-white">With over 15 years of experience we’ll ensure you always get the best<br>guidance we’re with you every step of the way</p>
								<a href="about-us.html" class="btn btn-primary" data-text="read more">read more</a>
								<a href="contact-us.html" class="btn btn-default" data-text="Contact Us">Contact Us</a>
							</div>
						</div>
					</li>

					<li>
						<div class="cd-full-width">
							<div class="container text-right">
								<h2>Clients <span class="color-default">Investment<br></span>Guidance</h2>
								<p>Doing the right thing for our clients, no matter what.</p>
								<a href="services.html" class="btn btn-primary" data-text="view our all services">view our all services</a>
							</div>
						</div>
					</li>

				</ul>

				<div class="cd-slider-nav">
					<nav class="container">
						<span class="cd-marker item-1"></span>
						
						<ul>
							<li class="selected"><a href="index.html#0"><div class="slide-number">1</div> Money Care<span>Finding your Next Advisor</span></a></li>
							<li><a href="index.html#0"><div class="slide-number">2</div> Friendly Assistance<span>Export Financial Advice</span></a></li>
							<li><a href="index.html#0"><div class="slide-number">3</div> Our Experience<span>We have 15 Years Experience</span></a></li>
							<li><a href="index.html#0"><div class="slide-number">4</div> Client Investment<span>Doing the right thing</span></a></li>
						</ul>
					</nav> 
				</div>
				
			</section> <!-- / MAIN BANNER -->
            
			
			
			
			<!-- WELCOME -->
            <section class="bg-blue">
				<div class="container">
					<div class="row">
						<div class="col-md-6 animate fadeInLeft">
							<h2>Welcome to Cheerfulgiverz</h2>
							<div class="height-10"></div>
							<p>Cheerful Giverz is a community of mutual aid givers who choose to donate to one another so as to help one another fund one project or another. We believe in the possibility of members helping each other realize their dreams through peer to peer donations. By giving, you receive. The concept is simple, GIVE TO ONE AND RECEIVE FROM TWO. That is two times of your donation in 2 – 14 days.</p>
							
							<div class="height-20"></div>
							
							<div class="height-40"></div>
						</div>
						<div class="col-md-6 animate fadeInRight">
							<div class="video-widget">
								<img src="{{asset('assets/frontend/images')}}/video-thumb.jpg" class="img-shadow" alt="">
								<a href="http://vimeo.com/36031564" class="fancybox-media"><i class="fa fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</section><!-- / WELCOME -->
			
			
			
<!--			 BENIFITS 
            <section class="text-center">
				<div class="container">
					<div class="two-items-carousel owl-carousel">
						<div class="image-and-text-box animate fadeInLeft">
							<div class="bordered-thumb"><a href="services.html"><img src="{{asset('assets/frontend/images')}}/img1.jpg" alt=""></a></div>
							<h3><a href="services.html">Why Our Consulting</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Love life’s sweetest reward Let it flow it floats back to you.</p>
						</div>
						<div class="image-and-text-box animate fadeInRight">
							<h3><a href="services.html">Investment Planning</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Love life’s sweetest reward Let it flow it floats back to you.</p>
							<div class="bordered-thumb"><a href="services.html"><img src="{{asset('assets/frontend/images')}}/img2.jpg" alt=""></a></div>
						</div>
						<div class="image-and-text-box">
							<div class="bordered-thumb"><a href="services.html"><img src="{{asset('assets/frontend/images')}}/img3.jpg" alt=""></a></div>
							<h3><a href="services.html">Retirement</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Love life’s sweetest reward Let it flow it floats back to you.</p>
						</div>
						<div class="image-and-text-box">
							<h3><a href="services.html">Wealth Management</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Love life’s sweetest reward Let it flow it floats back to you.</p>
							<div class="bordered-thumb"><a href="services.html"><img src="{{asset('assets/frontend/images')}}/img4.jpg" alt=""></a></div>
						</div>
						<div class="image-and-text-box">
							<div class="bordered-thumb"><a href="services.html"><img src="{{asset('assets/frontend/images')}}/img5.jpg" alt=""></a></div>
							<h3><a href="services.html">Lawyers Consulting</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Love life’s sweetest reward Let it flow it floats back to you.</p>
						</div>
						<div class="image-and-text-box">
							<h3><a href="services.html">Online Consulting</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Love life’s sweetest reward Let it flow it floats back to you.</p>
							<div class="bordered-thumb"><a href="services.html"><img src="{{asset('assets/frontend/images')}}/img6.jpg" alt=""></a></div>
						</div>
					</div>
				</div>
			</section> / BENIFITS -->
			
			
			
			<!-- FUNFACTS -->
			
            
			
			
			
			
			
			
			<!-- WHO IS BEHIND -->
            
			
			
			
			
			
			
			
			
			<!-- REQUEST A CALLBACK -->
            <section>
				<div class="container">
					
					<div class="row">
    			<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
					<!-- PRICE ITEM -->
					<div class="panel price panel-red">
						<div class="panel-heading  text-center">
						<h3>Starter</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>N10000</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-danger"></i> 2:1 Matrix</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Assign</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Cash Out</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Recycle</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> N20000 Return</li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-danger" href="{{url('sign-up')}}">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->
					
					
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
					<!-- PRICE ITEM -->
					<div class="panel price panel-blue">
						<div class="panel-heading arrow_box text-center">
						<h3>Professional</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>N20000</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-danger"></i> 2:1 Matrix</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Assign</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Cash Out</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Recycle</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> N40000 Return</li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-info" href="{{url('sign-up')}}">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->
					
					
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
					<!-- PRICE ITEM -->
					<div class="panel price panel">
						<div class="panel-heading arrow_box text-center">
						<h3>Premium</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>N50000</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-danger"></i> 2:1 Matrix</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Assign</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Cash Out</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Recycle</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> N100000 Return</li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-warning" href="{{url('sign-up')}}">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->
					
					
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
					<!-- PRICE ITEM -->
					<div class="panel price panel">
						<div class="panel-heading arrow_box text-center">
						<h3>Ultimate</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>N100000</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-danger"></i> 2:1 Matrix</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Assign</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Cash Out</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> Auto Recycle</li>
							<li class="list-group-item"><i class="icon-ok text-danger"></i> N200000 Return</li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-success" href="{{url('sign-up')}}">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->
					
					
				</div>
				
				
				
				
				
				
				
				
				
					
				
				
			</div>
					
				</div>
			</section>
			<!-- / REQUEST A CALLBACK -->
                        
                        @endsection
			
			
      		
			