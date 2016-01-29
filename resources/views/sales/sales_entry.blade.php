@extends('layouts.app')
    @section('content')
    <body>
    <section id="container" class="">
         @include('dashboard.header')
          @include('dashboard.sidebar')
     
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
            
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                    <!--custom chart start-->
                    <div class="create">
                      <center><h2>Create New Proposal</h2></center>
                      <label>Client:</label>
                      <select class="form-control">
                        <option value="">sample</option>
                        <option value="">sample1</option>
                        <option value="">sample2</option>
                        <option value="">sample3</option>
                      </select><br>
                      <label>Quotation No:</label>
                      <select class="form-control">
                        <option value="">sample</option>
                        <option value="">sample1</option>
                        <option value="">sample2</option>
                        <option value="">sample3</option>
                      </select><br>
                  
                    
                      <label>Date Signed</label>
                      <input type="date" class="form-control">
                      
                      <br>
                      <label>Amount(W/out Vat)</label>
                      <input type="number" class="form-control">
                      <br>
                       <label>Attach Quotation:</label>
                      <input type="file" class="form-control">
                       <br>
                       <label>Vat/Non-Vat</label>
                       <br>
                       <input type="radio">Vat
                       <input type="radio">Non-Vat
                       <br>
                       <br>
                       <label>Payment Terms:</label>
                       <br>
                       <br>
                       <label>Description:</label>
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
                       <br>
                       


                      <button type="submit" class="btn btn-info">Add Proposal</button>

                      </div>

                      <!--custom chart end-->
                  </div>
                  <div class="col-lg-4">
                      <!--new earning start-->
                      
                      <!--total earning end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      
                      <!--user info table end-->
                  </div>
                  
              </div>
        
      <!-- Right Slidebar end -->

      <!--footer start-->
     
      <!--footer end-->
  </section>

  </body>
@endsection