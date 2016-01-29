@extends('layouts.app')
    @section('content')
    <body>
    <section id="container" class="">
         @include('dashboard.header')
          @include('dashboard.sidebar')
         <!--sidebar end-->
         <!--main content start-->
         <section id="main-content">
            <section class="wrapper site-min-height">
               <!-- page start-->
               <section class="panel">
                  <header class="panel-heading">
                     List of Sales
                  </header>
                  <div class="panel-body">
                     <div class="adv-table editable-table ">
                        <div class="clearfix"></div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                           <thead>
                              <tr>
                                 Company Name
                                 <th>Company Name</th>
                                 <th>Project Name</th>
                               
                                 <th>Value</th>
                                 <th>Status</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="">
                                 <td>Jondi Rose</td>
                                 <td>Alfred Jondi Rose</td>
                                 <td>100000</td>
                                 <td>Pending</td>
                                  <td><a href="#">edit</a></td>
                                 <td><a class="delete" href="javascript:;">Delete</a></td>
                              </tr>
                              <tr class="">
                                 <td>Dulal</td>
                                 <td>Jonathan Smith</td>
                                 <td>500000</td>
                                 <td>Pending</td>
                                  <td><a href="#">edit</a></td>
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
   @endsection

