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

                      			<center>
                                    @if(isset($client))
                                        <h2>Edit {{ $client->company_name }} Record</h2>
                                    @else
                                        <h2>Create New Client Recprd</h2>
                                    @endif
                                </center>
                                @if(isset($client))
                        		<form method = "POST" action = "{{ url('/editClient', $client->client_id) }}">
                                @else
                                <form method = "POST" action = "{{ url('/insertClientRecord') }}">
                                @endif  
                        			{{ csrf_field() }}                    
                        			<label>Company Name:</label>
                                        @if(isset($client))
                        				    <input type="text" name="company_name" class="form-control" value = "{{ $client->company_name }}" >
                                        @else
                                            <input type="text" name="company_name" class="form-control" value = "{{ old('company_name') }}" >
                                        @endif
                        			<label><br>Address:</label>
                                        @if(isset($client))
                                            <input type="text" name="address" class="form-control" value = "{{ $client->company_address }}">
                                        @else
                                            <input type="text" name="address" class="form-control" value = "{{ old('address') }}">
                                        @endif
                        				
                    				<label><br>Contact Person</label>
                                        @if(isset($client))
                                            <input type="text" name="contact_person" class="form-control" value = "{{ $client->contact_person }}" >
                                        @else
                                            <input type="text" name="contact_person" class="form-control" value = "{{ old('contact_person') }}" >
                                        @endif
                    				
                    				<label><br>Contact Details:</label>
                						<div class="contain">
                							<div class="name">
                                                @if(isset($client))
                                                    <input type="text" name="contact_number" placeholder = "Contact Number" value = "{{ $client->contact_number }}" class="form-control">
                                                @else
                                                    <input type="text" name="contact_number" placeholder = "Contact Number" value = "{{ old('contact_number') }}" class="form-control">
                                                @endif
                							</div>
                							<div class="name">
                                                @if(isset($client))
                                                    <input type="email" name="email" placeholder = "Email Address" class="form-control" value = "{{ $client->email }}" >
                                                @else
                                                    <input type="email" name="email" placeholder = "Email Address" class="form-control" value = "{{ old('email') }}" >
                                                @endif
                							</div>
                						</div>
                    				<!-- <label><br>Credit Limit:</label>
                                        @if(isset($client))
                                            <input type="text" name="credit_limit" class="form-control" value = "{{ $client->credit_limit }}">
                                        @else
                                            <input type="text" name="credit_limit" class="form-control" value = "{{ old('credit_limit') }}">
                                        @endif -->
                    				<br>
                                    @if(isset($client))
                                        <button type="submit" name="submit" class="btn btn-info">Update Client Record</button>
                                    @else
                                        <button type="submit" name="submit" class="btn btn-info">Register Client</button>
                                    @endif 
                    			</form> 
                    		</div>
                    	</div>
                    </div>
                </section>
            </section>
        </section>
    </body>
    @endsection