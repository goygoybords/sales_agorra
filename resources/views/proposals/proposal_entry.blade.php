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
                  			<form method = "POST" action = "{{ url('/postProposal') }}"  enctype="multipart/form-data" > 
                  				{{ csrf_field() }}
                    		  <div class="create">
                          @if($errors->has())
                            @foreach ($errors->all() as $error)
                                <div id="error_message">{{ $error }}</div>
                              @endforeach

                           @elseif (Session::has('msg'))
                            <div id="error_message">{{ Session::get('msg') }}</div>
                          @endif
                    			<center><h2>Create New Proposal</h2></center>
		                      
                          <label>Prosal Detail</label><br>
		                      	<div class="contain">
		                      		<div class="name">
                            			<input type="date" name="proposal_date" value = "{{ old('proposal_date') }}" placeholder = "Proposal Date"  class="form-control">
                          			</div>
                          			<div class="name">
                              			<input type="text" name="project_name" value = "{{ old('project_name') }}" placeholder = "Project Name" class="form-control"  >
                          			</div>
                      			</div>
                      			<br>
                      			<label>Client:</label>
                      			<select name = "client" class="form-control">
                          			<option value = ""></option>
			                        @foreach($list as $l)
			                            <option value = "{{ $l->client_id }}">{{ $l->company_name }}</option>
			                        @endforeach
                      			</select>
                      			<br>
                      			<label>Service Category:</label><br>
                      				@foreach($services as $s)
			                        <input type="checkbox" name = "services[]" value = "{{ $s->service_category_id }}" class="check">{{ $s->service_name }}
                      				@endforeach
                      				<br>
                      			<br>
                            <label>Attachment</label><br>
                              <input type="file" name = "attachment" class = "form-control" style = "padding: 0px;">
                      			<br>
                            <label>Total</label><br>
                              <input type="text" name = "total" placeholder= "Total" class = "form-control">
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