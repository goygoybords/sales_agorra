@extends('layouts.app')
    @section('content')
    <body>
    	<section id="container" >
	      	@include('dashboard.header')
	      	@include('dashboard.sidebar')
      		<!--main content start-->
      		<section id="main-content">
          		<section class="wrapper">
              		<div class="row">
                  		<div class="col-lg-8">
                    	<!--custom chart start-->
                    		<div class="create">
                    			@if($errors->has())
						  			@foreach ($errors->all() as $error)
						      			<div id="error_message">{{ $error }}</div>
									@endforeach

								@elseif (Session::has('msg'))
						   			<div id="error_message">{{ Session::get('msg') }}</div>
						      	@endif
                      			<center><h2>Create New Client</h2></center>
                        		<form method = "POST" action = "{{ url('/insertClientRecord') }}">
                        			{{ csrf_field() }}                    
                        			<label>Company Name:</label>
                        				<input type="text" name="company_name" class="form-control" value = "{{ old('company_name') }}" >
                        			<label><br>Address:</label>
                        				<input type="text" name="address" class="form-control" value = "{{ old('address') }}">
                    				<label><br>Contact Person</label>
                    					<input type="text" name="contact_person" class="form-control" value = "{{ old('contact_person') }}" >

                    				<label><br>Contact Details:</label>
                						<div class="contain">
                							<div class="name">
                								<input type="text" name="contact_number" placeholder = "Contact Number" value = "{{ old('contact_number') }}" class="form-control">
                							</div>
                							<div class="name">
                								<input type="email" name="email" placeholder = "Email Address" class="form-control" value = "{{ old('email') }}" >
                							</div>
                						</div>
                    				<label><br>Credit Limit:</label>
                    					<input type="text" name="credit_limit" class="form-control">
                    				<br>
                    				<button type="submit" name="submit" class="btn btn-info">Register Client</button>
                    			</form> 
                    		</div>
                    	</div>
                    </div>
                </section>
            </section>
        </section>
    </body>
    @endsection