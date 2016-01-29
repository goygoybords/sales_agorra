@extends('layouts.app')
    @section('content')
    <body>
      <section id="container" >
          @include('dashboard.header')
          @include('dashboard.sidebar')
          <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      List Of Proposal
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group">   
                              </div>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Proposal No.</th>
                                  <th>Project Name</th>
                                  <th>Proposal Date</th>
                                  <th>Client</th>
                                  <th>Salesperson</th>
                                  <th>Total</th>
                                  <th>Attachments</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($list as $l)
                              <tr class="">
                                  <td>{{ $l->proposal_id }}</td>
                                  <th>{{ $l->project_name }}</thd>
                                  <td>{{ $l->proposal_date }}</td>
                                  <td>{{ $l->company_name }}</td>
                                  <td>{{ $l->name }}</td>
                                  <td>{{ $l->total }}</td>
                                  <td><a href ="">Download</a></td>
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
  </section>
  </body>
  @endsection

