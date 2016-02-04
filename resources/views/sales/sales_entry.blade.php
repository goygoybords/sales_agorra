@extends('layouts.app')
    @section('content')
    <body>
    <section id="container" class="">
         @include('dashboard.header')
          @include('dashboard.sidebar')
     
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-8">
                    <!--custom chart start-->
                    <div class="create">
                      <form method = "POST">
                      <center><h2>Create New Sales</h2></center>
                      <label>Proposal No:</label>
                      <select class="proposal form-control" name = "proposal" >
                         <option>List of Proposal Number</option>
                        @foreach($proposals as $p)
                        <option value = "{{ $p->proposal_id }}">
                          {{ $p->proposal_id }}
                        </option>
                        @endforeach
                      </select>

                      <br>
                      <label>Project name:</label>
                        <input type="text" class="project_name form-control">

                      <div class="row">
                        <div class="col-md-4">
                          <br><label>Date</label>
                           <input type="date" name="sales_date" value = "{{ date('Y/m/d') }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <br><label>Client</label>
                          <input type="text" name="client" class="client form-control"  >
                        </div>
                        <div class="col-md-4">
                          <br><label>Payment Terms</label>
                         <input type="text" name="terms" value = "{{ old('terms') }}" class="form-control"  >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <br><label>Amount Detail</label>
                           <input type="text" name="total" value = "{{ old('total') }}" class="total form-control">
                        </div>
                        <div class="col-md-4">
                          <br><label>is Vatable</label>
                          <select name = "isVatable" class = "vatable form-control">
                            <option>Select Here</option>
                            <option value = "0">Non - Vatable</option>
                            <option value = "1">Vatable</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <br><label>is Commissionable</label>
                          <select name = "isCommissionable" class = "form-control">
                            <option>Select Here</option>
                            <option value = "1">Yes</option>
                            <option value = "0">No</option>
                          </select>
                        </div>
                      </div>

                      <br>

                       <label>Attach Signed Quotation:</label>
                          <input type="file" name = "attachment" class="form-control" style = "padding:0px;">
                       <br>

                       <label>Salesperson</label>
                          <input type="text" name = "salesperson" class="salesperson form-control">
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
                       
                      <button type="submit" class="btn btn-info">Add Proposal</button>
                      </form>
                      </div>
                  </div>
           
              </div>
  </section>

  </body>
@endsection