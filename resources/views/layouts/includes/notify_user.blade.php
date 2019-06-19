<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="{{ route('reservation.index') }}" title="View all name reservations">
		    <div class="card card-hover">
		        <div class="card-body">
		            <!-- Row -->
		            <div class="row row-responsive">
		                <div class="col-md-8">
		                	<h2 class="text-danger"> 
		                		{{ App\Models\NameReservation::where('status',true)->get()->count() }}
		                		<i class="ti-direction-alt  font-14 text-danger"></i>
		                	</h2>
		                    <h6> Active </h6>
		                </div>
		                <div class="col-md-4 align-self-center text-right  p-l-0">
		                    <div id="">
	                    		{{ App\Models\NameReservation::all()->count() }} 
		                    	<br> Total
		                    </div>
		                </div>
		            </div>
		            <h5>Name Reservations <a href="{{ route('reservations.create') }}" style="padding-left: 4px; padding-right: 4px; border-left: thin solid #f2dede;  border-right: thin solid #f2dede; border-radius: 5px;" title="Add New"><i class="fa fa-plus text-danger"></i></a> </h5>
		        </div>
		    </div>
		</a>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="{{ route('reg.index') }}" title="View all company particulars">
	        <div class="card card-hover">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-md-8">
	                    	<h2 class="text-success">
	                    		{{ App\Models\Particular::where('status','pending')->get()->count() }} 
	                    		<i class="ti-gift font-14"></i>
	                    	</h2>
	                        <h6>Pending</h6>
	                    </div>
		                <div class="col-md-4 align-self-center text-right  p-l-0">
		                    <div id="">
	                    		{{ App\Models\Particular::all()->count() }} 
		                    	<br> Total
		                    </div>
		                </div>
	                </div>
	                <h5>Saved Particulars <a href="{{ route('reservations.create') }}" style="padding-left: 4px; padding-right: 4px; border-left: thin solid #c3e3b5;  border-right: thin solid #c3e3b5; border-radius: 5px;" title="Add New"><i class="fa fa-plus text-success"></i></a> </h5>
	            </div>
	        </div>
	    </a>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="{{ route('company.index') }}">
	        <div class="card card-hover">
	            <div class="card-body">
	                <!-- Row -->
	                <div class="row">
	                    <div class="col-md-8">
	                    	<h2 class="text-info">
	                    		{{ App\Models\CoRegistration::all()->count() }} 
	                    		<i class="ti-harddrives font-14"></i>
	                    	</h2>
	                        <h6>Registered</h6>
	                    </div>
	                    <div class="col-md-4 align-self-center text-right p-l-0">
	                        <div id="">
	                        	{{ App\Models\Company::all()->count() }}
	                        	<br>
	                        	Total
	                        </div>
	                    </div>
	                </div>
	                <h5> Companies <a href="{{ route('company.create') }}" style="padding-left: 4px; padding-right: 4px; border-left: thin solid #d9edf7;  border-right: thin solid #d9edf7; border-radius: 5px;" title="Add New Company"><i class="fa fa-plus text-info"></i></a> </h5>
	            </div>
	        </div>
	    </a>
	</div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<a href="{{ route('transaction.index') }}">
	        <div class="card card-hover">
	            <div class="card-body">
	                <!-- Row -->
	                <div class="row">
	                    <div class="col-md-8">
	                    	<h2 class="text-primary">
	                    		{{ App\Models\Transaction::all()->count() }}
	                    		<i class="ti-save font-14"></i>
	                    	</h2>
	                        <h6>Transations</h6>
	                    </div>
	                    <div class="col-md-4 align-self-center text-right p-l-0">
	                        <div id="">
	                        	0 <br>
	                        	Total
	                        </div>
	                    </div>
	                </div>
	                <h5>All Transactions <a href="{{ route('transaction.create') }}" style="padding-left: 4px; padding-right: 4px; border-left: thin solid #d9edf7;  border-right: thin solid #d9edf7; border-radius: 5px;" title="Add New Company"><i class="fa fa-plus text-primary"></i></a> </h5>
	            </div>
	        </div>
	    </a>
	</div>
</div>