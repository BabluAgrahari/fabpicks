 @extends('crm.layout.app')
 @section('content')
 <div class="dashboard-container">
     <div class="dashboard">
         <div class="dashboard-wrapper">
             <!-- <div class="dashboard-main-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-heading">
                                    <p>Dashboard</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="summary-title">
                                    <p class="title">Orders</p>
                                    <p class="refresh"><i class='bx bx-refresh'></i></p>
                                </div>
                                <div class="data-group-container">
                                    <div class="data-group-wrapper">
                                        <div class="data-group">
                                            <div class="data-number">
                                                <span>0</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-md-3">
                                <div class="summary-title">
                                    <p class="title">Purchase Order</p>
                                    <p class="refresh"><i class='bx bx-refresh'></i></p>
                                </div>
                                <div class="data-group-container">
                                    <div class="data-group-wrapper">
                                        <div class="data-group">


                                            <div class="data-number">
                                                <span>0</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-md-3">
                                <div class="summary-title">
                                    <p class="title">Purchase Order</p>
                                    <p class="refresh"><i class='bx bx-refresh'></i></p>
                                </div>
                                <div class="data-group-container">
                                    <div class="data-group-wrapper">
                                        <div class="data-group">


                                            <div class="data-number">
                                                <span>0</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-md-3">
                                <div class="summary-title">
                                    <p class="title">Purchase Order</p>
                                    <p class="refresh"><i class='bx bx-refresh'></i></p>
                                </div>
                                <div class="data-group-container">
                                    <div class="data-group-wrapper">
                                        <div class="data-group">


                                            <div class="data-number">
                                                <span>0</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                </div> -->

             <div class="breadcome-area">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <div class="breadcome-list">
                                 <div class="row">
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                         <div class="breadcomb-wp">
                                             <div class="breadcomb-icon">
                                                 <!-- <i class="icon nalika-home"></i> -->
                                                 <i class="fa-solid fa-house-user" style="font-size:30px"></i> &nbsp;&nbsp;
                                                 <!-- <i class="fa-solid fa-gauge-simple"></i> -->
                                             </div>
                                             <div class="breadcomb-ctn">
                                                 <h2>Dashboard</h2>
                                                 <!-- <p>Welcome to Nalika <span class="bread-ntd">Admin Template</span></p> -->
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                         <div class="breadcomb-report">
                                             <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn">
                                                 <!-- <i class="fa-sharp fa-solid fa-arrow-down-to-square" style="font-size:20px;color:white;"></i> -->
                                                 <!-- <i class="fa-solid fa-arrow-down-to-square"></i> -->
                                                 <i class="fa-solid fa-arrow-down-to-square"></i>
                                             </button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="section-admin container-fluid res-mg-t-15 mt-4">
                 <div class="row admin text-center">
                     <div class="col-md-12">
                         <div class="row">
                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="cursor:pointer;" id="button" onclick="showhide()">
                                 <div class="admin-content analysis-progrebar-ctn">
                                     <h4 class="text-left text-uppercase"><b>Orders</b></h4>
                                     <div class="row vertical-center-box vertical-center-box-tablet">
                                         <div class="col-xs-3 mar-bot-15 text-left">
                                             <label class="badge" style="background-color:green;">30% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                         </div>
                                         <div class="col-xs-9 cus-gh-hd-pro">
                                             <h2 class="text-right no-margin">10,000</h2>
                                         </div>
                                     </div>
                                     <div class="progress progress-mini">
                                         <div style="width: 78%;" class="progress-bar bg-green"></div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;cursor:pointer;" id="button2" onclick="showhide2()">
                                 <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                     <h4 class="text-left text-uppercase"><b>Bounce Rate</b></h4>
                                     <div class="row vertical-center-box vertical-center-box-tablet">
                                         <div class="text-left col-xs-3 mar-bot-15">
                                             <label class="badge" style="background-color:red;">15% <i class="fa fa-level-down" aria-hidden="true"></i></label>
                                         </div>
                                         <div class="col-xs-9 cus-gh-hd-pro">
                                             <h2 class="text-right no-margin">$5,000</h2>
                                         </div>
                                     </div>
                                     <div class="progress progress-mini">
                                         <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;cursor:pointer;" id="button3" onclick="showhide3()">
                                 <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                     <h4 class="text-left text-uppercase"><b>Unique Visitor</b></h4>
                                     <div class="row vertical-center-box vertical-center-box-tablet">
                                         <div class="text-left col-xs-3 mar-bot-15">
                                             <label class="badge" style="background-color:#2eb7f3;">50% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                         </div>
                                         <div class="col-xs-9 cus-gh-hd-pro">
                                             <h2 class="text-right no-margin">$70,000</h2>
                                         </div>
                                     </div>
                                     <div class="progress progress-mini">
                                         <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;cursor:pointer;" id="button4" onclick="showhide4()">
                                 <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                     <h4 class="text-left text-uppercase"><b>Total page Order</b></h4>
                                     <div class="row vertical-center-box vertical-center-box-tablet">
                                         <div class="text-left col-xs-3 mar-bot-15">
                                             <label class="badge" style="background-color:#805bbe;">80% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                         </div>
                                         <div class="col-xs-9 cus-gh-hd-pro">
                                             <h2 class="text-right no-margin">$100,000</h2>
                                         </div>
                                     </div>
                                     <div class="progress progress-mini">
                                         <div style="width: 60%;" class="progress-bar bg-purple"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="product-sales-area mg-tb-30 mt-4 accessibility-issue--error">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <div class="product-sales-chart">
                                 <div class="portlet-title">
                                     <div class="row">
                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden" id="newpost">
                                             <div class="chart">
                                                 <h2>Order chart :-</h2>
                                                 <!-- <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                                                 <div> <img src="./assets/img/chart/chart.png" style="width:200%;height:300px" alt="Oop's No"> </div>
                                             </div>

                                         </div>
                                         <div class="hidden" id="newpost2">
                                             <div class="chart">
                                                 <h2>Bounce Rate :-</h2>
                                                 <!-- <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                                                 <!-- <div> <img src="./assets/img/chart/redchart.png" style="width:100%;height:300px" alt="Oop's No"> </div> -->
                                                 <center>
                                                     <div id="myPlot2" style="width:100%;max-width:700px"></div>
                                                 </center>
                                             </div>
                                         </div>
                                         <div class="hidden" id="newpost3">
                                             <div class="chart">
                                                 <h2>Unique Visitor :-</h2>
                                                 <!-- <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                                                 <!-- <div> <img src="./assets/img/chart/uniquevisitor.png" style="width:100%;height:300px" alt="Oop's No"> </div> -->
                                                 <!-- <center> <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div></center> -->
                                                 <center>
                                                     <div id="myPlot" style="width:100%;max-width:700px"></div>
                                                 </center>
                                             </div>
                                         </div>
                                         <div class="hidden" id="newpost4">
                                             <div class="chart">
                                                 <h2>Total Page Views :-</h2>
                                                 <!-- <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                                                 <!-- <div> <img src="./assets/img/chart/totalpage.png" style="width:100%;height:300px" alt="Oop's No"> </div> -->
                                                 <center>
                                                     <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
                                                 </center>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div id="curved-line-chart" class="flot-chart-sts flot-chart curved-chart-statistic"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>

 @push('js')
 <script>
     function showhide() {
         var div = document.getElementById("newpost");
         var div2 = document.getElementById("newpost2");
         var div3 = document.getElementById("newpost3");
         var div4 = document.getElementById("newpost4");
         if (div.style.display !== "block") {
             div.style.display = "block";
             div2.style.display = "none";
             div3.style.display = "none";
             div4.style.display = "none";

         } else {
             div.style.display = "none";
             div2.style.display = "none";
             div3.style.display = "none";
             div4.style.display = "none";
         }
     }

     function showhide2() {
         var div2 = document.getElementById("newpost2");
         var div = document.getElementById("newpost");
         var div3 = document.getElementById("newpost3");
         var div4 = document.getElementById("newpost4");
         if (div2.style.display !== "none") {
             div2.style.display = "none";
             div3.style.display = "none";
             div4.style.display = "none";

         } else {
             div2.style.display = "block";
             div.style.display = "none";
             div3.style.display = "none";
             div4.style.display = "none";
         }
     }

     function showhide3() {
         var div4 = document.getElementById("newpost4");
         var div3 = document.getElementById("newpost3");
         var div2 = document.getElementById("newpost2");
         var div = document.getElementById("newpost");
         if (div3.style.display !== "none") {
             div3.style.display = "none";
             div.style.display = "none";
             div2.style.display = "none";
             div4.style.display = "none";
         } else {
             div3.style.display = "block";
             div.style.display = "none";
             div2.style.display = "none";
             div4.style.display = "none";
         }
     }

     function showhide4() {
         var div4 = document.getElementById("newpost4");
         var div3 = document.getElementById("newpost3");
         var div2 = document.getElementById("newpost2");
         var div = document.getElementById("newpost");
         if (div4.style.display !== "none") {
             div4.style.display = "none";
             div3.style.display = "none";
             div.style.display = "none";
             div2.style.display = "none";
         } else {
             div4.style.display = "block";
             div3.style.display = "none";
             div.style.display = "none";
             div2.style.display = "none";
         }
     }
 </script>

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
             title: 'TOTAL PAGE ORDER'
         };
         var chart = new google.visualization.BarChart(document.getElementById('myChart'));
         chart.draw(data, options);
     }
 </script>

 <script>
     var xArray = ["Italy", "France", "Spain", "USA", "Argentina"];
     var yArray = [55, 49, 44, 24, 15];

     var data = [{
         x: xArray,
         y: yArray,
         type: "bar"
     }];

     var layout = {
         title: "UNIQUE VISITOR"
     };

     Plotly.newPlot("myPlot", data, layout);
 </script>

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
         title: "Bounce Rate"
     };

     Plotly.newPlot("myPlot2", data, layout);
 </script>

 @endpush
 @endsection