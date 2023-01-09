 @extends('crm.layout.app')
 @section('content')
 <div class="page-container">
     <div class="daterange-search ">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6">
                     <div class="daterange-box">
                         <div class="daterange-field">

                             <input type="text" name="dates">
                         </div>

                         <div class="search-btn">
                             <button type="submit" class="btn btn-success">Search</button>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>

     <!-- custom-chart -->
     <div class="product-sales-area ">
         <div class="container-fluid">
             <div class="row  ">
                 <div class="col-md-7">
                     <div class="row">
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>Total Order</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-1">
                                         <i class="fa-solid fa-basket-shopping"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h4>{{$allOrder}}</h4>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>New Order</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-2">
                                         <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h4>{{$pendingOrder}}</h4>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>Delivered Order</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-6">
                                         <i class="fa-solid fa-cart-plus"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h4>{{$delviredOrder}}</h4>
                                 </div>
                             </div>
                         </div>

                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>Total Income</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box  icon-3">
                                         <i class="fa-solid fa-dollar-sign"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h4>0</h4>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>Total Expense</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-4">
                                         <i class="fa-solid fa-chart-line"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h4>0</h4>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>All User</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-5">
                                         <i class="fa-solid fa-users"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h4>{{$allUser}}</h4>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="col-md-5 ">
                     <div class="product-sales-chart">
                         <div class="portlet-title">
                             <div class="chart-box chart-box-1 chart-box show ">

                                 <div class="myChartDiv">
                                     <div id="chart_div"></div>
                                 </div>
                             </div>

                             <div class="chart-box chart-box-3 " id="newpost3">
                                 <div class="chart">
                                     <h4 class="text-center">Fixed Price :-</h4>
                                     <div class="d-flex justify-content-center">
                                         <div id="myPlot"></div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>

                 </div>

             </div>

             <div class="row ">
                 <div class="col-md-7">
                     <div class="chart-box chart-box-2 show">

                         <div id="chart_div1" class="chart chart-show"></div>
                     </div>
                 </div>

                 <div class="col-md-5">
                     <div class="chart-box chart-box-4 show pt-5" id="newpost4">
                         <div class="chart">

                             <div class="d-flex justify-content-center">
                                 <div id="chart">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- custom-end -->

     <div class="product-order-list">
         <div class="contianer">
             <div class="table-container ">
                 <div class="row">
                     <div class="col-md-12 ">
                         <div class="table-responsive">
                             <table class="table products-table">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Order Number</th>
                                         <th scope="col">Order Date</th>
                                         <th scope="col">Amount</th>
                                         <th scope="col">Status</th>
                                         <th scope="col">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($lists as $key=>$list)
                                     <tr>
                                         <th scope="row">{{++$key}}</th>
                                         <td>{{$list->order_number}}</td>
                                         <td>{{date('d-m-Y',(int)$list->order_date)}}</td>
                                         <td>{{$list->amount}}</td>
                                         <td>

                                             <select _id="{{$list->_id}}" class="status form-select form-select-sm">
                                                 <option value="pending" {{$list->order_status =='pending'?'selected':''}}>Pending</option>
                                                 <option value="accept" {{$list->order_status =='accept'?'selected':''}}>Accept</option>
                                                 <option value="dispatch" {{$list->order_status =='dispatch'?'selected':''}}>Dispatch</option>
                                                 <option value="delivared" {{$list->order_status =='delivared'?'selected':''}}>Delivared</option>
                                             </select>
                                         </td>
                                         <td><a href="{{url('crm/order-details/'.$list->_id)}}" class="orderDetails text-info" _id="{{$list->_id}}">
                                                 <x-icon type="details" />
                                             </a></td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @push('js')

 <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
 <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script src="https://d3js.org/d3.v3.min.js"></script>
 <script src="{{asset('assets')}}/js/revenue-chart.js"></script>
 <script src="{{asset('assets')}}/js/sale-chart.js"></script>
 <script src="{{asset('assets')}}/js/total-order-chart.js"></script>
 <script src="{{asset('assets')}}/js/short-chart.js"></script>
 <script src="{{asset('assets')}}/js/product-chart.js"></script>
 <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

 @push('js')
 <script>
     $(document).on('change', '.status', function(e) {
         e.preventDefault(0);
         // alert('hellow');
         let id = $(this).attr('_id');
         let order_status = $(this).val();
         $.ajax({
             url: "{{url('crm/order')}}/" + id,
             type: 'post',
             datatype: 'JSON',
             data: {
                 _token: '{{ csrf_token() }}',
                 'order_status': order_status,
             },
             success: function(res) {
                 if (res.status || !res.status) {
                     let status = res.status ? 'success' : 'error';
                     $.toast({
                         text: res.msg,
                         heading: ucwords(status),
                         icon: status,
                         position: 'top-right',
                     })
                 }
             }

         });
     });
 </script>
 @endpush

 <!-- second chart start-->
 <script>
     google.charts.load('current', {
         'packages': ['corechart']
     });
     google.charts.setOnLoadCallback(drawChart);

     function drawChart() {
         var data = google.visualization.arrayToDataTable([
             ['Contry', 'Mhl'],
             ['Italy', 55],
             ['France', 49],
             ['Spain', 44],
             ['USA', 24],
             ['Argentina', 15]
         ]);
         var options = {
             title: 'TOTAL PAGE ORDER',
             'width': 400,
             'height': 300
         };
         var chart = new google.visualization.BarChart(document.getElementById('myChart'));
         chart.draw(data, options);
     }
 </script>
 <!-- second chart End-->

 <!-- third chart start -->

 <script>
     var xArray = ["Italy", "France", "Spain", "USA", "Argentina"];
     var yArray = [55, 49, 44, 24, 15];

     var data = [{
         x: xArray,
         y: yArray,
         type: "bar"
     }];

     var layout = {
         title: "Fixed Price",
         'width': 400,
         'height': 300
     };

     Plotly.newPlot("myPlot", data, layout);
 </script>
 <!-- third chart end -->

 <!-- fouth chart start -->
 <script>
     var xArray = [55, 49, 44, 24, 15];
     var yArray = ["Italy ", "France ", "Spain ", "USA ", "Argentina "];

     var data = [{
         x: xArray,
         y: yArray,
         type: "bar",
         orientation: "h",
         marker: {
             color: "rgba(255,0,0,0.6)"
         }
     }];

     var layout = {
         title: "Brand Store",
         'width': 400,
         'height': 300
     };

     Plotly.newPlot("myPlot2", data, layout);
 </script>
 <!-- fouth chart End -->


 <!--  -->
 <script>
     google.load("visualization", "1", {
         packages: ["corechart"]
     });
     google.setOnLoadCallback(drawChart1);

     function drawChart1() {
         var data = google.visualization.arrayToDataTable([
             ['Year', 'Sales', 'Expenses'],
             ['2004', 1000, 400],
             ['2005', 1170, 460],
             ['2006', 660, 1120],
             ['2007', 1030, 540]
         ]);

         var options = {
             title: 'Company Performance',
             hAxis: {
                 title: 'Year',
                 titleTextStyle: {
                     color: 'red'
                 }
             },


         };

         var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
         chart.draw(data, options);
     }
 </script>

 <!-- Date Range -->
 <script>
     $('input[name="dates"]').daterangepicker();
 </script>


 @endpush
 @endsection