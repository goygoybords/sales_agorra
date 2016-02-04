<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Sales System | {{ $title }} </title>

        <!-- Bootstrap core CSS -->

        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-reset.css') }}" >
        <!--external css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome/css/font-awesome.css') }}"  />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}"  type="text/css" media="screen"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/data-tables/DT_bootstrap.css') }}" />

        <link href="{{ URL::asset('css/slidebars.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/style-responsive.css') }}" rel="stylesheet" />
    </head>

    @yield('content')


    <footer class="site-footer">
        <div class="text-center">
            2016 &copy; Optimind Technology Solutions.
            <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
        </div>
    </footer>

    <!-- Script files -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ URL::asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/slidebars.min.js') }}"></script>
    <script src="{{ URL::asset('js/common-scripts.js') }}"></script>

    <script src="{{ URL::asset('js/sparkline-chart.js') }}"></script>
    <script src="{{ URL::asset('js/easy-pie-chart.js') }} "></script>
    <script src="{{ URL::asset('js/count.js') }} "></script>
    <script src="{{ URL::asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-migrate-1.2.1.min.js') }} "></script>
  
  
    <script type="text/javascript" src="{{ URL::asset('assets/data-tables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/data-tables/DT_bootstrap.js') }} "></script>
    <script src="{{ URL::asset('js/editable-table.js') }}"></script>

    <!-- END JAVASCRIPTS -->
    <script>
      jQuery(document).ready(function() {
          EditableTable.init();
      });
    </script>
    <script>
         //owl carousel
         
         $(document).ready(function() {
             $("#owl-demo").owlCarousel({
                 navigation : true,
                 slideSpeed : 300,
                 paginationSpeed : 400,
                 singleItem : true,
         autoPlay:true
         
             });
         });
         
         //custom select box
         
         $(function(){
             $('select.styled').customSelect();
         });
         
      </script>

      <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
              autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
              autoPlay:true

          });
      });

      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });

      // script for sales
      $('.proposal').change(function()
      {
          var proposal_id = $(".proposal option:selected").val();
          var project_name = '';
          var company_name = '';
          var salesperson = '';
          var client = '';
          var total = '';
          if(proposal_id != '')
          {
              $.ajax({
                  type: "POST",
                  url: '{{ url("/getSalesData") }}',
                  data: { _token : "{{ csrf_token() }}" , proposal_id: proposal_id },
                  success: function(data)
                  {   
                      for(i=0; i< data.length; i++)
                      {
                          project_name = data[i].project_name;
                          company_name = data[i].company_name;
                          salesperson = data[i].name;
                          total = data[i].total;
                      }
                       $('.salesperson').val(salesperson)
                       $('.project_name').val(project_name);
                       $('.client').val(company_name);
                       $('.total').val(total);
                  }
              }); // end of ajax
          }//end of if
      });//end of item list

  </script>

  