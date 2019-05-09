<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="{{ route('reservation.index') }}">
		    <div class="card card-hover">
		        <div class="card-body">
		            <!-- Row -->
		            <div class="row row-responsive">
		                <div class="col-8">
		                	<h2> 
		                		{{ App\Models\NameReservation::where('status',true)->get()->count() }}
		                		<i class="ti-save-alt font-14 text-danger"></i>
		                	</h2>
		                    <h6> Active </h6>
		                </div>
		                <div class="col-4 align-self-center text-right  p-l-0">
		                    <div id="">
	                    		{{ App\Models\NameReservation::all()->count() }} 
		                    	<br> Total
		                    </div>
		                </div>
		            </div>
		            <h5>Name Reservations</h5>
		        </div>
		    </div>
		</a>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="{{ route('reg.index') }}">
	        <div class="card card-hover">
	            <div class="card-body">
	                <!-- Row -->
	                <div class="row">
	                    <div class="col-8"><h2 class="">3670 <i class="ti-angle-up font-14 text-success"></i></h2>
	                        <h6>Tax Deduction</h6></div>
	                    <div class="col-4 align-self-center text-right p-l-0">
	                        <div id="sparklinedash"></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </a>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="javascript:void(0)">
	        <div class="card card-hover">
	            <div class="card-body">
	                <!-- Row -->
	                <div class="row">
	                    <div class="col-8"><h2>1562 <i class="ti-save font-14 text-success"></i></h2>
	                        <h6>Revenue Stats</h6></div>
	                    <div class="col-4 align-self-center text-right p-l-0">
	                        <div id="sparklinedash2"></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </a>
    </div>
    <!-- Column -->

    <div class="col-lg-3 col-md-6">
    	<a href="javascript:void(0)">
	        <div class="card card-hover">
	            <div class="card-body">
	                <!-- Row -->
	                <div class="row">
	                    <div class="col-8"><h2>35% <i class="ti-save font-14 text-danger"></i></h2>
	                        <h6>Yearly Sales</h6></div>
	                    <div class="col-4 align-self-center text-right p-l-0">
	                        <div id="">
	                        	0 <br>
	                        	Total
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </a>
	</div>
</div>