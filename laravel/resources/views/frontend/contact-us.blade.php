@extends('layouts.frontend.master')
@section('content')
            
            
            <section class="subpage-header">
				<div class="container">
					<div class="site-title clearfix">
						<h2>Contact Us</h2>
						<ul class="breadcrumbs">
							<li><a href="contact-us.html#.">Home</a></li>
							<li>Contact Us</li>
						</ul>
					</div>
					<a href="contact-us.html" class="btn btn-primary get-in-touch" data-text="Contact us"><i class="icon-telephone114"></i>Contact us</a>
				</div>
			</section>
            
            
			
			<!-- CONTACT US -->
            <section>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 animate fadeInLeft">
							<h3>Sales Queries</h3>
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<img src="{{asset('assets/frontend')}}/images/sales-quries-img.jpg" class="quries-img" alt="">
									<div class="height-20"></div>
								</div>
								<div class="col-md-8 col-sm-8">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor at tellus feugiat congue quis ut nunc. Semper ac dolor Eaque ipsa quae.</p>
									<p>ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. luptas sit aspernatur.</p>
								</div>
							</div>
							<div class="height-20"></div>
							<h3>Follow Us</h3>
							<ul class="social">
								<li class="animate bounceIn"><a href="contact-us.html#." class="facebook"><i class="icon-facebook-1"></i></a></li>
								<li class="animate bounceIn" data-delay="100"><a href="contact-us.html#." class="twitter"><i class="icon-twitter-1"></i></a></li>
								<li class="animate bounceIn" data-delay="200"><a href="contact-us.html#." class="google-plus"><i class="icon-google"></i></a></li>
								<li class="animate bounceIn" data-delay="300"><a href="contact-us.html#." class="linkedin"><i class="icon-linkedin3"></i></a></li>
							</ul>
							<div class="height-50"></div>
						</div>
						
						<div class="form">
						<div class="col-md-6 col-sm-6 animate fadeInRight">
						
                                                    @if(Session::has('message'))
                                                    <div class='alert alert-success'>
                                                        {{Session::get('message')}}
                                                    </div>
                                                    @endif
                                                    
                                                    @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    
                                                    
						
							<form class="contact-form" name="contact_form" id="contact_form" method="post" action="{{url('enquiry')}}">
							{{csrf_field()}}	
                                                            <div class="row">
									<div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="input">Name</label>
                                                                                <input name='name' value="{{old('name')}}" type="text" class="form-control" id="input" placeholder="Ex: Jhon Doe">
                                                                            </div>
									</div>
									<div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="input">Email</label>
                                                                                <input name='email' value="{{old('email')}}" type="text" class="form-control" id="input" placeholder="Ex: Example@example.com">
                                                                            </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="input">Phone</label>
                                                                                <input name='phone' value="{{old('phone')}}" type="text" class="form-control" id="input" placeholder="Ex: xx-xxxxxxxxxx">
                                                                            </div>
									</div>
								</div>
                                                            <div class="form-group">
                                                                <textarea name='matter' class="form-control" rows="3">{{old('')}}</textarea>
                                                            </div>
                                                            <input class="btn btn-success" type="submit" value="Submit">
							</form>
							
							
						</div>
						</div>
						
					</div>
				</div>
			</section><!-- / COMPANY OVERVIEW -->
			
			
			
			
			
                        
@endsection
			
      		
			