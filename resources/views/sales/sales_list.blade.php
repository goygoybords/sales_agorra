@extends('layouts.app')
    @section('content')
    <body>
    	<section id="container" class="">
        	@include('dashboard.header')
        	@include('dashboard.sidebar')
        	<section id="main-content">
        		<section class="wrapper site-min-height">
        			<section class="panel">
	                  	<header class="panel-heading">List of Sales</header>
	                  	<div class="panel-body">
	                  		<div class="adv-table editable-table ">
	                  			<div class="clearfix"></div>
	                  			<div class="space15"></div>
	                  			<table class="table table-striped table-hover table-bordered" id="editable-sample">
	                  				<thead>
	                  					<tr>Optimind Techonolgy Solutions
	                  						<th>Sales #</th>
	                  						<th>Date</th>
	                  						<th>Quotation #</th>
	                  						<th>Company Name</th>
	                  						<th>Project Name</th>
				                            <th>Total</th>
				                            <th>Status</th> 
				                            <th>Edit</th>
				                            <th>Delete</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	@foreach($sales as $s)
				                    	<tr class="">
				                    		<td>{{ $s->sales_id }}</td>
			                                <td>{{ $s->sales_date }}</td>
			                                <td>{{ $s->proposal_id }}</td>
			                                <td>{{ $s->company_name }}</td>
			                                <td>{{ $s->project_name }}</td>
			                                <!-- <td>@if ($s->isVatable == 1) Yes @else No @endif </td>
			                                <td>@if ($s->isCommisionable == 1) Yes @else No @endif </td> -->
			                                <td>{{ $s->total }} </td>
			                                <td>
			                                	@if ($s->status == 1) Pending 
			                                	@elseif ($s->status == 0) Canceled Sale
			                                	@elseif ($s->status == 2) Paid 
			                                	@endif</td> 
			                                <td>
			                                	@if($s->status == 0 || $s->status == 2)
			                                	<label>No Action</label>
			                                	@else
			                                	<a href = "{{ url('/editSales' , $s->sales_id)}} ">Edit</a>
			                                	@endif
			                                </td>
			                                <td>
			                                	@if($s->status == 0 || $s->status == 2)
			                                	<label>No Action</label>
			                                	@else
			                                	<a href = "{{ url('cancelSales', $s->sales_id)}} ">Delete</a>
			                                	@endif
			                                </td>
			                            </tr>
			                            @endforeach
			                        </tbody>
			                    </table>
			                    <a href ="{{ url('/exportSales') }}"><button>Export To Excel</button></a>
			                </div>
			            </div>
			        </section>
		    	</section>
			</section>
		</section>
	</body>
   	@endsection



