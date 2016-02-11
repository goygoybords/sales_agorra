@extends('layouts.app')
    @section('content')
    <body>
		<section id="container" class="">
			@include('dashboard.header')
			@include('dashboard.sidebar')
			<section id="main-content">
          		<section class="wrapper site-min-height">
	            	<!-- page start-->
	              	<section class="panel">
	                	<header class="panel-heading"> List Of Client</header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  Optimind Technology Solutions
                                  <th>Company Name</th>
                                  <th>Address</th>
                                  <th>Contact Person</th>
                                  <th>Contact No.</th>
                                  <th>Email</th>
                                  <th>Balance</th>
                                  <th>Edit</th>
                                  <!-- <th>Delete</th> -->
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($list as $l) 
                              <tr class="">
                                  <td>{{ $l->company_name }}</td>
                                  <td>{{ $l->company_address }}</td>
                                  <td>{{ $l->contact_person }}</td>
                                  <td>{{ $l->contact_number }}</td>
                                  <td>{{ $l->email }}</td>
                                  <td>{{ $l->balance }}</td>
                                 <!--  -->
                                  <td><a href="{{ url('/editClient', $l->client_id)}} ">Edit</a></td>
                                  <!-- <td><a class="delete" href="javascript:;">Delete</a></td> -->
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
      <!--footer end-->
  </section>

  </body>
  @endsection


