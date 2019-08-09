<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ config('app.name') }}">
  <meta name="author" content="Bruno Nicholas">
  <meta name="email" content="sbnibro256@gmail.com">
  <title> Welcome | {{ config('app.name') }}</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('scss/icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.1') }}" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="{{ asset('assets/css/docs.min.css') }}" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="javascript:void(0)">
          <img src="{{ asset('assets/images/ursb_logo.jpg') }}" alt="{{ config('app.name') }}" style="border: thin solid transparent; border-radius: ">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="../assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Sections</span>
              </a>
              <div class="dropdown-menu">
                <a href="javascript:void(0)" class="dropdown-item">Home</a>
                <a href="javascript:void(0)" class="dropdown-item">App Sections</a>
                <a href="javascript:void(0)" class="dropdown-item">Tips</a>
                <a href="javascript:void(0)" class="dropdown-item">Send Message</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="javascript:void(0)" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="javascript:void(0)" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="javascript:void(0)" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="javascript:void(0)" target="_blank" data-toggle="tooltip" title="Star us on Github">
                <i class="fa fa-github"></i>
                <span class="nav-link-inner--text d-lg-none">Github</span>
              </a>
            </li>
            @if (Route::has('login'))
            	@auth
		            <li class="nav-item d-none d-lg-block ml-lg-4">
		              <a href="{{ route('login') }}" target="_blank" class="btn btn-neutral btn-icon">
		                <span class="btn-inner--icon">
		                  <i class="fa fa-home mr-2"></i>
		                </span>
		                <span class="nav-link-inner--text">Home</span>
		              </a>
		            </li>
		        @else
		            <li class="nav-item d-none d-lg-block ml-lg-4">
		              <a href="{{ route('login') }}" target="_blank" class="btn btn-neutral btn-icon">
		                <span class="btn-inner--icon">
		                  <i class="fa fa-user mr-2"></i>
		                </span>
		                <span class="nav-link-inner--text">Login</span>
		              </a>
		            </li>
		            <li class="nav-item d-none d-lg-block ml-lg-4">
		              <a href="{{ route('login') }}" target="_blank" class="btn btn-neutral btn-icon">
		                <span class="btn-inner--icon">
		                  <i class="fa fa-user-plus mr-2"></i>
		                </span>
		                <span class="nav-link-inner--text">Register</span>
		              </a>
		            </li>
		        @endauth
		    @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="display-3  text-white" title="Uganda Registration Services Bearue!">The Solution for URSB
                  <span>{{ config('app.name') }} is the solution.</span>
                </h1>
                <p class="lead  text-white">Keeping track of all the registered companies from and their fee affairs for all periods from the opening of the company.</p>
                <div class="btn-wrapper">
                	@if (Route::has('login'))
	                	@auth
	                        <a href="{{ url('/home') }}" class="btn btn-info btn-icon mb-3 mb-sm-0">
	                        	<span class="btn-inner--icon"><i class="fa fa-home"></i></span>
	                        	<span class="btn-inner--text">Home</span>
	                        </a>
	                    @else
			                <a href="{{ route('login') }}" class="btn btn-info btn-icon mb-3 mb-sm-0">
			                    <span class="btn-inner--icon"><i class="fa fa-lock"></i></span>
			                    <span class="btn-inner--text">Login</span>
			                </a>
						@endauth
					@endif
                  <a href="{{ route('reservation.create') }}" class="btn btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                    <span class="btn-inner--text">Register Company</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
    <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="ni ni-check-bold"></i>
                    </div>
                    <h6 class="text-primary text-uppercase">Company Creation</h6>
                    <p class="description mt-3"> {{ config('app.name') }} will guide you on your first steps of creating a company. Please be sure to gather all necessary requirements as required in the guidelines. </p>
                    <div>
                      <span class="badge badge-pill badge-primary">Booking</span>
                      <span class="badge badge-pill badge-primary">Startup</span>
                      <span class="badge badge-pill badge-primary">Create</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Learn more</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                      <i class="ni ni-istanbul"></i>
                    </div>
                    <h6 class="text-success text-uppercase">Running Company</h6>
                    <p class="description mt-3">A quick, efficient and fast way of clearing the monthly debts and other charges for your company to URSB.</p>
                    <div>
                      <span class="badge badge-pill badge-success">Payment</span>
                      <span class="badge badge-pill badge-success">Paypal</span>
                      <span class="badge badge-pill badge-success">Secure</span>
                    </div>
                    <a href="#" class="btn btn-success mt-4">Learn more</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                      <i class="ni ni-planet"></i>
                    </div>
                    <h6 class="text-warning text-uppercase">Help &amp; Terms</h6>
                    <p class="description mt-3">View all help with the terms and conditions on how to use {{ config('app.name') }}. If you have issues, please send us regards below.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">Help</span>
                      <span class="badge badge-pill badge-warning">User Terms</span>
                      <span class="badge badge-pill badge-warning">Conditions</span>
                    </div>
                    <a href="#" class="btn btn-warning mt-4">Learn more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-lg bg-gradient-default">
      <div class="container pt-lg pb-300">
        <div class="row text-center justify-content-center">
          <div class="col-lg-10">
            <h2 class="display-3 text-white">{{ config('app.name') }}</h2>
            <p class="lead text-white"> The company management system that handles the Uganda Registration Service Bureau for compan management and secure payments. .</p>
          </div>
        </div>
        <div class="row row-grid mt-5">
          <div class="col-lg-4">
            <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
              <i class="ni ni-settings text-primary"></i>
            </div>
            <h5 class="text-white mt-3">Building tools</h5>
            <p class="text-white mt-3">Grow your company from nothing to a successful investiment without disturbance.</p>
          </div>
          <div class="col-lg-4">
            <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
              <i class="ni ni-ruler-pencil text-primary"></i>
            </div>
            <h5 class="text-white mt-3">Secure Payments</h5>
            <p class="text-white mt-3">Enjoy simplified payments and avoid moving from place to place for Banking.</p>
          </div>
          <div class="col-lg-4">
            <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
              <i class="ni ni-atom text-primary"></i>
            </div>
            <h5 class="text-white mt-3">Efficiency</h5>
            <p class="text-white mt-3">The quickest way and efficient for all transactions made in this application.</p>
          </div>
        </div>
      </div>
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="section section-lg pt-lg-0 section-contact-us">
      <div class="container">
        <div class="row justify-content-center mt--300">
          <div class="col-lg-8">
            <form method="POST" action="{{ route('messages.store') }}">
            	@csrf
            	<div class="card bg-gradient-secondary shadow">
	              <div class="card-body p-lg-5">
	                <h4 class="mb-1">Want to work with us?</h4>
	                <p class="mt-0">Your views are is very important to us.</p>
	                <div class="form-group mt-5">
	                  <div class="input-group input-group-alternative">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text"><i class="ni ni-user-run"></i></span>
	                    </div>
	                    <input class="form-control" name="name" placeholder="Your name" type="text">
	                  </div>
	                </div>
	                <input type="hidden" name="sender" value="{{ App\User::where('role','guest')->get()->first()->id }}">
	                <input type="hidden" name="receiver" value="{{ App\User::where('role','admin')->get()->first()->id }}">
	                <div class="form-group">
	                  <div class="input-group input-group-alternative">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
	                    </div>
	                    <input class="form-control" name="email" placeholder="Email address" type="email">
	                  </div>
	                </div>
	                <div class="form-group mb-4">
	                  <textarea class="form-control form-control-alternative" name="message" rows="4" cols="80" placeholder="Type a message..."></textarea>
	                </div>
	                <div>
	                  <button type="submit" class="btn btn-default btn-round btn-block btn-lg">Send Message</button>
	                </div>
	              </div>
            	</div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer has-cards">
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
          <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
        </div>
        <div class="col-lg-6 text-lg-center btn-wrapper">
          <a target="_blank" href="javascript:void(0)" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-twitter"></i>
          </a>
          <a target="_blank" href="javascript:void(0)" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
            <i class="fa fa-facebook-square"></i>
          </a>
          <a target="_blank" href="javascript:void(0)" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-dribbble"></i>
          </a>
          <a target="_blank" href="javascript:void(0)" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Star on Github">
            <i class="fa fa-github"></i>
          </a>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; {{ date('Y') }}
            <a href="{{ route('login') }}" target="_blank"> {{ config('app.name') }} </a>.
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a href="mailto:sbnibro256@gmail.com" class="nav-link" target="_blank">By Bruno Nicholas</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link" target="_blank">Login</a>
            </li>
            <li class="nav-item">
              <a href="mailto:" class="nav-link" target="_blank">Powered By Reuben Idro</a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/popper/popper.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/headroom/headroom.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.0.1') }}"></script>
</body>

</html>