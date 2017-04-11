<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>

    <base href="" />

	<!-- Basic Page Needs
     ================================================== -->
	 <meta charset="utf-8">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>Cheerfulgiverz</title>
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">

	 
	 <!-- Mobile Specific Metas
     ================================================== -->
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
     <meta name="format-detection" content="telephone=no">
	 
     
	 
     <!-- Favicons
     ================================================== -->
     <link rel="icon" type="image/png" href="images/favicon.png">
     
	 
     <!-- Fonts
     ================================================== -->
     <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
     
    <!-- CSS
     ================================================== -->
	
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css')}}/bootstrap.css">

	<!-- advisor -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css')}}/advisor.css">

	<!-- plugins -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css')}}/plugins.css">	

	<!-- advisor color -->
	<link rel="stylesheet" id="color" href="{{asset('assets/frontend/css')}}/color-default.css">

	<!-- hero slider -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css')}}/hero-slider.css">
	
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css')}}/responsive.css">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('assets/frontend/css')}}/jquery.countdownTimer.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- HEADER SCRIPTS
    
    ================================================== -->
	<script href="{{asset('assets/frontend/js')}}/modernizr.js"></script>
        <script src="{{asset('assets/frontend/js')}}/jquery-2.2.0.js"></script>
        <script src="{{asset('assets/frontend/js')}}/jquery.countdown.min.js"></script>
	
	
</head>
    <body class="fixed-header">
	    	
			
			
			<!-- LOADER -->
<!--			<div id="loader" class="loader">
				<div class="spinner">
				  <div class="double-bounce1"></div>
				  <div class="double-bounce2"></div>
				</div>
			</div>-->
			
			
			
			
			
			
            
            <!-- HERDER -->
            <header id="header" class="h-one-h">
            	
				<div class="container">
						
					<!-- TOP BAR -->
					<div class="top-bar clearfix">
						<p> You are welcome!!</p>
						<ul>
							
                                                        <li><i class="fa fa-user"></i> 
                                                            @if(Auth::check())
                                                            <a href='{{url('profile').'/'.Auth::user()->id}}'>{{Auth::user()->name}}</a> | <a href="{{url('logout')}}"> Logout</a>
                                                            @else
                                                            <span>
                                                                <a href="{{url('login')}}">Login</a>
                                                            </span> |
                                                            <span>
                                                                <a href="{{url('sign-up')}}">Sign Up</a>
                                                            </span>
                                                            @endif
                                                            
                                                        </li>
						</ul>
					</div>
					<!-- / TOP BAR -->
					
					<!-- HEADER INNER -->
					<div class="header clearfix">
						
						<a style="width:75px;" href="index.html" class="logo"><img src="{{asset('assets/frontend/images')}}/logo.jpg" alt=""></a>
						
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<div class="search-btn">
							<a href="javascript:void(0);" class="search-trigger"><i class="icon-icons185"></i></a>
						</div>
						
						<div class="search-container">
							<i class="fa fa-times header-search-close"></i>
							<div class="search-overlay"></div>
							<div class="search">
								<form>
									<label>Search:</label>
									<input type="text" placeholder="">
									<button><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
						
						<nav class="main-nav navbar-collapse collapse" id="primary-nav">
							<ul class="nav nav-pills">
								
								<li class="active"><a href="{{url('/')}}">Home</a></li>
								
								<li><a href="{{url('about')}}">About Us</a></li>
                                                                <li><a href="{{url('how-it-works')}}">How it works</a></li>
                                                                
                                                                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                                                                <li><a href="{{url('contact')}}">Contact</a></li>
								
							</ul>
						</nav>
						
					</div><!-- / HEADER INNER -->
					
                </div><!-- / CONTAINER -->
				
            </header><!-- / HERDER -->
            
            <!-- HERDER -->
            <header id="header" class="header-two h-two-h" style="display:none;">
            	
				<!-- TOP BAR -->
				<div class="top-bar-simple clearfix">
					<div class="container">
						<p>We have over 15 years of experience.</p>
						<ul class="social">
							<li><a href="https://www.facebook.com/Cheerfulgiverzonline/" class="facebook"><i class="icon-facebook-1"></i></a></li>
							<li><a href="www.twitter.com/cheerfulgiverz" class="twitter"><i class="icon-twitter-1"></i></a></li>
							
						</ul>
					</div>
				</div>
				<!-- / TOP BAR -->
				
				
				<div class="container">
					
					<!-- HEADER INNER -->
					<div class="header clearfix">
						
						<a href="index.html" class="logo"><img href="{{asset('assets/frontend/images')}}/logo.png" alt=""></a>
						
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<div class="search-btn">
							<a href="javascript:void(0);" class="search-trigger"><i class="icon-icons185"></i></a>
						</div>
						
						
						<div class="search-container">
							<i class="fa fa-times header-search-close"></i>
							<div class="search-overlay"></div>
							<div class="search">
								<form>
									<label>Search:</label>
									<input type="text" placeholder="">
									<button><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
						
						
						<ul class="header-contact-widget clearfix">
							<li>
								<i class="icon-telephone114"></i>
								<p>+1 900 234 567<a href="mailto:support@advisor.com">support@advisor.com</a></p>
							</li>
							<li>
								<i class="icon-icons74"></i>
								<p>Manhattan Hall,<span>Advisor Melbourne, australia</span></p>
							</li>
							<li>
								<i class="icon-icons20"></i>
								<p>08:00 - 16:30<span>Monday to Saturday</span></p>
							</li>
						</ul>
						
						
					</div><!-- / HEADER INNER -->
					
					
					<nav class="main-nav navbar-collapse collapse" id="primary-nav">
						<ul class="nav nav-pills">
							<li class="dropdown active"><a href="index.html#.">Home <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="index.html">Home One</a></li>
									<li><a href="index2.html">Home Two</a></li>
									<li class="active"><a href="index3.html">Home Three</a></li>
								</ul>
							</li>
							<li><a href="about-us.html">About Us</a></li>
							<li class="dropdown"><a href="index.html#.">Services <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="services.html">Financial Planning</a></li>
									<li><a href="services.html">Bonds</a></li>
									<li><a href="services.html">Commodities</a></li>
									<li><a href="services.html">Investment Trusts</a></li>
									<li class="dropdown-submenu"><a href="index.html#.">Mutual Funds <i class="fa fa-caret-right"></i></a>
										<ul class="dropdown-menu">
											<li><a href="services.html">Financial Planning</a></li>
											<li><a href="services.html">Bonds</a></li>
											<li><a href="services.html">Commodities</a></li>
										</ul>
									</li>
									<li><a href="services.html">Retirement</a></li>
									<li><a href="services.html">Trades</a></li>
								</ul>
							</li>
							<li><a href="cases.html">Cases</a></li>
							<li class="dropdown"><a href="index.html#.">News <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="news.html">News One</a></li>
									<li><a href="news2.html">News Two</a></li>
								</ul>
							</li>
							<li><a href="shop.html">Shop</a></li>
							<li class="dropdown"><a href="index.html#.">Contact Us <i class="fa fa-caret-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="contact-us.html">Contact Us One</a></li>
									<li><a href="contact-us2.html">Contact Us Two</a></li>
								</ul>
							</li>
						</ul>
					</nav>
					
					
                </div><!-- / CONTAINER -->
				
            </header><!-- / HERDER -->
            
			
			<!-- HERDER -->
            <header id="header" class="header-three h-three-h" style="display:none;">
            	
				<div class="container-fluid">
					
					
					<!-- HEADER INNER -->
					<div class="header clearfix">
						
						<a href="index.html" class="logo"><img href="{{asset('assets/frontend/images')}}/logo.png" alt=""></a>
						
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<ul class="header-links clearfix">
							<li class="header-number"><a href="index.html#."><i class="icon-phone4"></i>+1 900 234 567 - 68</a></li>
							<li class="header-time"><a href="index.html#."><i class="icon-clock"></i>Mon to Sat 08:00 - 16:30</a></li>
							<li><a href="index.html#." class="btn btn-primary btn-quote" data-text="Get a quote">Get a quote</a></li>
						</ul>
						
						<nav class="main-nav navbar-collapse collapse" id="primary-nav">
							<ul class="nav nav-pills">
								<li class="dropdown active"><a href="index.html#.">Home <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu">
										<li class="active"><a href="index.html">Home One</a></li>
										<li><a href="index2.html">Home Two</a></li>
										<li><a href="index3.html">Home Three</a></li>
									</ul>
								</li>
								<li><a href="about-us.html">About Us</a></li>
								<li class="dropdown"><a href="index.html#.">Services <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="services.html">Financial Planning</a></li>
										<li><a href="services.html">Bonds</a></li>
										<li><a href="services.html">Commodities</a></li>
										<li><a href="services.html">Investment Trusts</a></li>
										<li class="dropdown-submenu"><a href="index.html#.">Mutual Funds <i class="fa fa-caret-right"></i></a>
											<ul class="dropdown-menu">
												<li><a href="services.html">Financial Planning</a></li>
												<li><a href="services.html">Bonds</a></li>
												<li><a href="services.html">Commodities</a></li>
											</ul>
										</li>
										<li><a href="services.html">Retirement</a></li>
										<li><a href="services.html">Trades</a></li>
									</ul>
								</li>
								<li><a href="cases.html">Cases</a></li>
								<li class="dropdown"><a href="index.html#.">News <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="news.html">News One</a></li>
										<li><a href="news2.html">News Two</a></li>
									</ul>
								</li>
								<li><a href="shop.html">Shop</a></li>
								<li class="dropdown"><a href="index.html#.">Contact Us <i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="contact-us.html">Contact Us One</a></li>
										<li><a href="contact-us2.html">Contact Us Two</a></li>
									</ul>
								</li>
							</ul>
						</nav>
						
					</div><!-- / HEADER INNER -->
					
                </div><!-- / CONTAINER -->
				
            </header><!-- / HERDER -->
            
            @yield('content')
            
            <footer id="footer">
				<div class="container">
					<div class="footer-top clearfix">
						
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<div class="footer-logo animate fadeInLeft"><a href="index.html"><img href="{{asset('assets/frontend/images')}}/footer-logo.png" alt=""></a></div>
							</div>
							<div class="col-md-9 col-sm-9">
							<h2>Disclaimer</h2>
								<p>
Cheerfulgiverz is not a get rich quick scheme or HYIP, it is a community of mutual help givers living the life of cheerful giving in the knowledge that whoever gives receives a double portion! Hence payment is directly dependent on the participation of the members. The principle is simple: give one and receive from two. This requires that all members always actively promote continuous participation in the scheme as members gets their donations directly from each other.</p>
							</div>
						</div>
					
						<div class="height-50"></div>
						
						<div class="footer-left">
							<div class="footer-address-widget clearfix">
								<ul>
									<li><i class="icon-telephone114"></i>+1 900 234 567<a href="mailto:support@advisor.com">supprt@advisor.com</a></li>
									<li><i class="icon-icons74"></i>Manhattan Hall,<span>Advisor Ltd 1258, Melbourne, australia</span></li>
								</ul>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="usefull-links-widget clearfix">
										<h4>Usefull Links</h4>
										<ul>
											<li><a href="{{url('/')}}">Home</a></li>
											<li><a href="{{url('about')}}">About Us</a></li>
											
											<li><a href="{{url('how-it-works')}}">How It Works</a></li>
											<li><a href="{{url('contact')}}">Contact Us</a></li>
										</ul>
										<ul>
											<li><a href="services.html">Bonds</a></li>
											<li><a href="services.html">Commodities</a></li>
											<li><a href="services.html">Investments</a></li>
											<li><a href="services.html">Retirement</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="twitter-widget clearfix">
										<h4>Twitter Feeds</h4>
										<div class="tweet">
											<i class="icon-twitter-1"></i>
											<p><a href="index.html#">@Rotography</a> Please kindly use our Support Forum: <a href="index.html#.">pixelatic.co.uk.</a>
											<span>about a month ago</span>
											</p>
										</div>
										<div class="tweet">
											<i class="icon-twitter-1"></i>
											<p><a href="index.html#">@Rotography</a> Please kindly use our Support Forum: <a href="index.html#.">pixelatic.co.uk.</a>
											<span>about a month ago</span>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="footer-right">
							<div class="newsletter-widget">
								<h4>Our Newsletter</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod.</p>
								<div class="form">
									<p class="subscribe_success" id="subscribe_success" style="display:none;"></p>
									<p class="subscribe_error" id="subscribe_error" style="display:none;"></p>
								
									<form name="subscribe_form" id="subscribe_form" method="post" action="index.html#" onSubmit="return false">
										<input type="text" data-delay="300" placeholder="Your Name" name="subscribe_name" id="subscribe_name" onKeyPress="removeChecks();" class="input" >
										<input type="text" data-delay="300" placeholder="Email Address" name="subscribe_email" id="subscribe_email" onKeyPress="removeChecks();" class="input" >
										<button class="btn btn-primary" name="Subscribe" type="submit" data-text="Subscribe" onClick="validateSubscription();">Subscribe</button>
									</form>
								
								</div>
								<ul class="social">
									<li class="animate bounceIn"><a href="https://www.facebook.com/Cheerfulgiverzonline/" class="facebook"><i class="icon-facebook-1"></i></a></li>
									<li class="animate bounceIn" data-delay="100"><a href="www.twitter.com/cheerfulgiverz" class="twitter"><i class="icon-twitter-1"></i></a></li>
<!--									<li class="animate bounceIn" data-delay="200"><a href="index.html#." class="google-plus"><i class="icon-google"></i></a></li>
									<li class="animate bounceIn" data-delay="300"><a href="index.html#." class="linkedin"><i class="icon-linkedin3"></i></a></li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6"><p>Coyright © 2016 Advisor. All rights reserved.</p></div>
							<div class="col-md-6 col-sm-6"><p class="text-right">Designed by <a href="http://suryawebtech.com">Suryawebtech</a></p></div>
						</div>
					</div>
				</div>
				
			</footer>
			
			
			
            
		<!-- FOOTER SCRIPTS
		================================================== -->
		
		<script src="{{asset('assets/frontend/js')}}/smooth-scroll.js"></script>
		<script src="{{asset('assets/frontend/js')}}/bootstrap.min.js"></script>
                
		<script src="{{asset('assets/frontend/js')}}/counter.js"></script>
		<script src="{{asset('assets/frontend/js')}}/common.js"></script>
		<script src="{{asset('assets/frontend/js')}}/scripts.js"></script>
		<script src="{{asset('assets/frontend/js')}}/hero-slider.js"></script>
                
                
                <script>
                $(function () {
                    $('[data-toggle="popover"]').popover({
                    
                    html:true
                
                    });
                });
                </script>
		
		
<!--		 DEMO 
		<script href="{{asset('assets/frontend/demo-files')}}/js/jquery.cookie.js"></script>
		<script href="{{asset('assets/frontend/demo-files')}}/js/switcher.js"></script>-->
		
		
    </body>
</html>