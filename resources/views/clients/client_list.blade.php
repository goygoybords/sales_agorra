@extends('layouts.app')
    @section('content')
    <body>
    	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	        <div class="modal-dialog" role="document">
	        	<div class="modal-content">
	        		<div class="modal-header">
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        			<h4 class="modal-title" id="exampleModalLabel">EDIT INFORMATION</h4>
	      			</div>
		      		<div class="modal-body">
		        		<form method = "POST">
			          		<div class="form-group">
				            	<label for="recipient-name" class="control-label">Name:</label>
				            	<input type="text" class="form-control" id="recipient-name">
				          	</div>
			          		<div class="form-group">
					            <label for="message-text" class="control-label">Contact Number:</label>
					            <input type="text" class="form-control" id="message-text"></textarea>
			          		</div>
					        <div class="form-group">
					        	<label for="message-text" class="control-label">Value:</label>
					            <input type="number" class="form-control" id="message-text"></textarea>
					        </div>
			          		<div class="form-group">
			            		<label for="message-text" class="control-label">Email Address:</label>
			            		<input type="email" class="form-control" id="message-text"></textarea>
			         	 	</div>
			         	 </form>
		         	</div>
		         	<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
		        		<div class="btnEdit">
		        			<button type="button" class="btn btn-primary">Update</button>
		        		</div>
		        	</div>
	        	</div>
		    </div>
		</div>
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
                                  Company Name

                                  <th>Company Name</th>
                                  <th>Name of Client</th>
                                  <th>Position</th>
                                  <th>Contact No.</th>
                                  <th>Email</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <td>Jondi Rose</td>
                                  <td>Alfred Jondi Rose</td>
                                  <td>manager</td>
                                  <td>1234</td>
                                  <td class="center">super user</td>
                                  <td><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</a></td>
                                  <td><a class="delete" href="javascript:;">Delete</a></td>
                              </tr>
                              <tr class="">
                                  <td>Dulal</td>
                                  <td>Jonathan Smith</td>
                                  <td>manager</td>
                                  <td>434</td>
                                  <td class="center">new user</td>
                                  <td><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</a></td>
                                  <td><a class="delete" href="javascript:;">Delete</a></td>
                              </tr>
                              
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


