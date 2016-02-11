@extends('layouts.app')
    @section('content')
    <body>
    <section id="container" class="">
        @include('dashboard.header')
        @include('dashboard.sidebar')
  
        <section id="main-content">
         	<section class="wrapper">
         		<div class="row">
         			<div class="col-lg-8">
         				<div class="create">
                            @if(isset($sales))
                                <form method = "POST" action = "{{ url('/editSales', $sales->sales_id) }}" enctype="multipart/form-data">
         					@else
                                <form method = "POST" action = "{{ url('/postSales') }}" enctype="multipart/form-data" >
         					@endif
                                {{ csrf_field() }}
                                @if($errors->has())
                                    @foreach ($errors->all() as $error)
                                        <div id="error_message">{{ $error }}</div>
                                    @endforeach

                                @elseif (Session::has('msg'))
                                    <div id="error_message">{{ Session::get('msg') }}</div>
                                @endif

                                @if(isset($sales))
                                    <center><h2>Update Sales Record</h2></center>
                                @else
         						     <center><h2>Create New Sales</h2></center>
                                @endif
                                
         						<label>Proposal No:</label>
                                @if(isset($sales))
                                    <input type = "text" name = "proposal" value = "{{ $sales->proposal_id }}" readonly class = "form-control">
                                @else
             						<select class="proposal form-control" name = "proposal" >
             							<option></option>
             							@foreach($proposals as $p)
    	         							<option value = "{{ $p->proposal_id }}">
    	         								{{ $p->proposal_id }}
    	         							</option>
             							@endforeach
             						</select>
                                @endif
         						<br>
         						<label>Project name:</label>
                                @if(isset($sales))
                                     <input type="text" value = "{{ $prop->project_name }}" readonly class="project_name form-control">
                                @else
                                    <input type="text" readonly class="project_name form-control">
                                @endif
         					
         						<div class="row">
         							<div class="col-md-4">
         								<br><label>Date</label>
                                        @if(isset($sales))
         								   <input type="date" name="sales_date" value = "{{ date('Y/m/d', strtotime($sales->sales_date))  }}" readonly class="form-control">
         							    @else
                                            <input type="date" name="sales_date" value = "{{ date('Y/m/d') }}" class="form-control">
                                        @endif
                                    </div>
         							<div class="col-md-4">
         								<br><label>Client</label>
                                        @if(isset($sales))
         								   <input type="text"  value = "{{ $prop->company_name }}" readonly class="client form-control" >
         							    @else
                                            <input type="text" name = "customer" readonly class="client form-control" >
                                        @endif
                                    </div>
         							<div class="col-md-4">
         								<br><label>Payment Terms</label>
                                        @if(isset($sales))
                                            <input type="text" name="terms" value = "{{ $sales->terms }}" class="form-control"  >
                                        @else
         								   <input type="text" name="terms" value = "{{ old('terms') }}" class="form-control"  >
         							    @endif
                                    </div>
         						</div>

         						<div class="row">
         							<div class="col-md-4">
         								<br><label>Amount Detail</label>
                                        @if(isset($sales))
                                            <input type="text" value = "{{ $sales->total }}" name="total" readonly class="total form-control">
                                        @else
         								   <input type="text" name="total" readonly class="total form-control">
         							    @endif
                                    </div>
         							<div class="col-md-4">
         								<br><label>is Vatable</label>
                                        @if(isset($sales))
                                            <select name = "isVatable" class = "vatable form-control">
                                                <option></option>
                                                <option value = "1" @if($sales->isVatable == 1) selected = selected @endif> Vatable</option>
                                                <option value = "0" @if($sales->isVatable == 0) selected = selected @endif> Non - Vatable</option> 
                                            </select>
                                        @else
         								<select name = "isVatable" class = "vatable form-control">
         									<option></option>
                                            <option value = "1">Vatable</option>
				                            <option value = "0">Non - Vatable</option> 
				                        </select>
                                        @endif
                        			</div>
                        			<div class="col-md-4">
                                        <br><label>is Commissionable</label>
                                        @if(isset($sales))
                                            <select name = "isCommissionable" class = "form-control">
                                                <option></option>
                                                <option value = "1" @if($sales->isCommisionable == 1) selected @endif>Yes</option>
                                                <option value = "0" @if($sales->isCommisionable == 0) selected @endif>No</option>
                                            </select>
                                        @else
                            				<select name = "isCommissionable" class = "form-control">
                            					<option></option>
                            					<option value = "1">Yes</option>
                            					<option value = "0">No</option>
                            				</select>
                                        @endif
                        			</div>
                        		</div>
                        		<br>
                        		<label>Attach Signed Quotation:</label>
                                @if(isset($sales))
                                    <div class="contain">
                                            <div class="name">
                                                <a href ="">{{ $attach->filename }}</a>
                                            </div>
                                            <div class="name">
                                                <a href = "#" class = "displayer">Upload a new file</a>
                                                <a href = "#" class = "closer">Cancel</a>
                                                <input type="file" name = "attachment" class="attachment form-control" style = "padding:0px;">
                                            </div>
                                        </div>
                                @else
                        		    <input type="file" name = "attachment" class="form-control" style = "padding:0px;">
                       			@endif
                                <br>
                       			<label>Salesperson</label>
                                @if(isset($sales))
                                    <input type="text" readonly value = "{{ $prop->name }}" class="salesperson form-control">
                                @else
                       			      <input type="text" readonly class="salesperson form-control">
                       			@endif
                                <br>

                       			 <!--  <label>Description:</label>
			                        <textarea class="form-control"></textarea>
			                        <br>
			                        <label>Percentage(%)</label>
			                        <input type="text" class="form-control">
			                        <br>
			                        <label>Ex-Deal(Yes/No)</label>
			                       <br>
			                       <input type="radio">Yes
			                       <input type="radio">No
			                       <br>
			                       <br> -->
                                @if(isset($sales))
                                    <button type="submit" class="btn btn-info">Update Sales Record</button>
                                @else
                       			  <button type="submit" class="btn btn-info">Add Sales Record</button>
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

                     