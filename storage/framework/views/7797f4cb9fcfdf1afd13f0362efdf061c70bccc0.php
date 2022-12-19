 
 <?php $__env->startSection('content'); ?>
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
                                         <h6>Total Sell</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-1">
                                         <i class="fa-solid fa-basket-shopping"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h2>0</h2>
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
                                     <h2>0</h2>
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
                                     <h2>0</h2>
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
                                     <h2>0</h2>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>New User</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-5">
                                         <i class="fa-solid fa-users"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h2>0</h2>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="dashboard-box">
                                 <div class="dashboard-title-group dashboard-box-top">
                                     <div class="dashboard-title">
                                         <h6>Pending Order</h6>
                                     </div>
                                     <div class="dashboard-icon icon-box icon-6">
                                         <i class="fa-solid fa-cart-plus"></i>
                                     </div>
                                 </div>

                                 <div class="dashboard-stats">
                                     <h2>0</h2>
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
                                     <h2 class="text-center">Fixed Price :-</h2>
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
                                         <th scope="col">Product Name</th>
                                         <th scope="col">Order Id</th>
                                         <th scope="col">Price</th>
                                         <th scope="col">Sold</th>
                                         <th scope="col">Status</th>
                                         <th scope="col">Sales</th>
                                         <th scope="col">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <th scope="row">1</th>
                                         <td>Product - 1</td>
                                         <td>#4545</td>
                                         <td>Rs. 455</td>
                                         <td>984</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 12984</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">2</th>
                                         <td>Product - 2</td>
                                         <td>#45455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>

                                         <td>
                                             <div class="status-box pending">
                                                 Pending
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">3</th>
                                         <td>Product - 3</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box success">
                                                 Success
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">4</th>
                                         <td>Product - 4</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box success">
                                                 Success
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">5</th>
                                         <td>Product - 5</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">6</th>
                                         <td>Product - 6</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box pending">
                                                 Pending
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box pending">
                                                 Pending
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box pending">
                                                 Pending
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box pending">
                                                 Pending
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Product - 7</td>
                                         <td>#455</td>
                                         <td>Rs. 4565</td>
                                         <td>9834</td>
                                         <td>
                                             <div class="status-box failed">
                                                 Failed
                                             </div>
                                         </td>
                                         <td>Rs. 129384</td>
                                         <td>
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input customCheckbox" type="checkbox" role="switch" id="customCheckbox" checked>
                                             </div>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>

                 <div class="row align-items-center mb-3">
                     <div class="col-md-1">
                         <div class="list-number">
                             <select name="" id="" class="form-select">
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="14">14</option>
                                 <option value="15">15</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                             </select>
                         </div>
                     </div>

                     <div class="col-md-5 ">
                         <p class="mb-0">Showing 1 to 6 of 25 Results</p>
                     </div>

                     <div class="col-md-6 d-flex justify-content-end">
                         <nav aria-label="Page navigation  pagination-sm">
                             <ul class="pagination">
                                 <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                 <li class="page-item"><a class="page-link" href="#">1</a></li>
                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                                 <li class="page-item"><a class="page-link" href="#">Next</a></li>
                             </ul>
                         </nav>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php $__env->startPush('js'); ?>

 <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
 <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script src="https://d3js.org/d3.v3.min.js"></script>
 <script src="<?php echo e(asset('assets')); ?>/js/revenue-chart.js"></script>
 <script src="<?php echo e(asset('assets')); ?>/js/sale-chart.js"></script>
 <script src="<?php echo e(asset('assets')); ?>/js/total-order-chart.js"></script>
 <script src="<?php echo e(asset('assets')); ?>/js/short-chart.js"></script>
 <script src="<?php echo e(asset('assets')); ?>/js/product-chart.js"></script>
 <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>



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


 <?php $__env->stopPush(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('crm.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/dashboard.blade.php ENDPATH**/ ?>