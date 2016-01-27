@extends('layouts.app')
    @section('content')
    <body>
    	<section id="container" >
    		@include('dashboard.header')
      		@include('dashboard.sidebar')
      		<section id="main-content">
          		<section class="wrapper">
              		<div class="row">
                  		<div class="col-lg-8">
                  			<form method = "POST" action = "">
                  				{{ csrf_field() }}
                    		<div class="create">
                    			<center><h2>Create New Proposal</h2></center>
		                      	<label>Prosal Detail</label><br>
		                      	<div class="contain">
		                      		<div class="name">
                            			<input type="text" name="proposal_date" placeholder = "Proposal Date"  class="form-control">
                          			</div>
                          			<div class="name">
                              			<input type="text" name="project_name" placeholder = "Project Name" class="form-control"  >
                          			</div>
                      			</div>
                      			<br>
                      			<label>Client:</label>
                      			<select class="form-control">
                          			<option value = ""></option>
			                        @foreach($list as $l)
			                            <option value = "{{ $l->client_id }}">{{ $l->company_name }}</option>
			                        @endforeach
                      			</select>
                      			<br>
                      			<label>Sale Category:</label><br>
                      				@foreach($services as $s)
			                        <input type="checkbox" name = "services[]" value = "{{ $s->service_category_id }}" class="check">{{ $s->service_name }}
			                  
                      				@endforeach
                      				<br>
                      			<br>

		                      	<div class="contain">
		                      		<div class="name">
                            			<input type="number" name = "quotation_number" placeholder = "Quotaion No." class="form-control">
                          			</div>
                          			<div class="name">
                              			<input type="file" name = "attachment" class = "form-control" style = "padding: 0px;">
                          			</div>
                      			</div>
                      			<br>
               
                      			<label>Date Sent</label>
                      				<input type="date" class="form-control">
                      			<br>
                     		 	<button type="submit" class="btn btn-info">Add Proposal</button>
                  			</div>
                  			</form>
                		</div>
              		</div>
            	</div>
          	</section>
        </section>
    </section>
	</body>
  	@endsection