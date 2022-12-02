<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Design</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css-pro-layout.css" />
    <link rel="stylesheet" href="assets/css/remixicon.css" />
    <!-- Font Awesome  -->
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />

</head>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!-- header include start -->
        <?php include "sidebar.php" ?>
        <!-- header include end -->
        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <!-- header include start -->
            <?php include "header.php" ?>
            <!-- header include end -->

            <main class="content">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-md-3" id="button">
                            <div class="dashboard-box b-right active">
                                <div class="dashboard-box-top">
                                    <div class="icon-box">
                                        <i class="fa-sharp fa-solid fa-bag-shopping"></i>
                                    </div>
                                    <div class="title">
                                        <p>Total Orders</p>
                                    </div>
                                </div>
                                <div class="dashboard-box-middle">
                                    <div class="price-box">
                                        <h1>999<span style="font-size:15px;"> +60</span></h1>
                                    </div>

                                    <div class="dashboard-box-chart">
                                        <div id="progress" data-donut="60">
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom-container">
                                    <div class="date-range ">
                                        <div class="date-title">Date Range</div>
                                        <div id="reportrange">
                                            <span style="color:#fff"></span> <b class="caret"></b>
                                            <i class="fa-regular fa-square-caret-down" style="color:#fff;font-size:20px;"></i>
                                        </div>
                                    </div>
                                    <div class="short-graph">
                                        <div class="d-flex justify-content-center">
                                            <div id="chart1"> </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3" id="button2">
                            <div class="dashboard-box b-right">
                                <div class="dashboard-box-top">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="title">
                                        <p>Brand Store</p>
                                    </div>
                                </div>
                                <div class="dashboard-box-middle">
                                    <div class="price-box">
                                        <h1>625<span style="font-size:15px;"> +60</span></h1>
                                    </div>
                                    <div class="dashboard-box-chart">
                                        <div id="progress1" data-donut="80">
                                        </div>
                                    </div>
                                </div>



                                <div class="bottom-container">
                                    <div class="date-range">
                                        <div class="date-title">Date Range</div>
                                        <div id="reportrange1">
                                            <span style="color:#fff"></span> <b class="caret"></b>
                                            <i class="fa-regular fa-square-caret-down" style="color:#fff;font-size:20px;"></i>
                                        </div>
                                    </div>
                                    <div class="short-graph">
                                        <div class="d-flex justify-content-center">
                                            <div id="chart2"> </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3" id="button3">
                            <div class="dashboard-box b-right">
                                <div class="dashboard-box-top">
                                    <div class="icon-box">
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div class="title">
                                        <p>Fixed Price</p>
                                    </div>
                                </div>
                                <div class="dashboard-box-middle">
                                    <div class="price-box">
                                        <h1>643<span style="font-size:15px;"> +60</span></h1>
                                    </div>
                                    <div class="dashboard-box-chart">
                                        <div id="progress2" data-donut="40">
                                        </div>
                                    </div>
                                </div>



                                <div class="bottom-container">
                                    <div class="date-range">
                                        <div class="date-title">Date Range</div>
                                        <div id="reportrange2">
                                            <span style="color:#fff"></span> <b class="caret"></b>
                                            <i class="fa-regular fa-square-caret-down" style="color:#fff;font-size:20px;"></i>
                                        </div>
                                    </div>
                                    <div class="short-graph">
                                        <div class="d-flex justify-content-center">
                                            <div id="chart3"> </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3" id="button4">
                            <div class="dashboard-box">
                                <div class="dashboard-box-top">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </div>
                                    <div class="title">
                                        <p>Rewards Store </p>
                                    </div>
                                </div>
                                <div class="dashboard-box-middle">
                                    <div class="price-box">
                                        <h1>780<span style="font-size:15px;"> +60</span></h1>
                                    </div>
                                    <div class="dashboard-box-chart">
                                        <div id="progress3" data-donut="90">
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom-container">
                                    <div class="date-range">
                                        <div class="date-title">Date Range</div>
                                        <div id="reportrange3">
                                            <span style="color:#fff"></span> <b class="caret"></b>
                                            <i class="fa-regular fa-square-caret-down" style="color:#fff;font-size:20px;"></i>
                                        </div>
                                    </div>
                                    <div class="short-graph">
                                        <div class="d-flex justify-content-center">
                                            <div id="chart4"> </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- custom-chart -->
                <div class="product-sales-area ">
                    <div class="container">
                        <div class="row g-0">

                            <div class="col-md-7">
                                <table class="table table-light table-striped products-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Product - 1</td>
                                            <td>#4545</td>
                                            <td>Rs. 455</td>
                                            <td>984</td>
                                            <td>Rs. 12984</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Product - 2</td>
                                            <td>#45455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Product - 3</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Product - 4</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Product - 5</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Product - 6</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Product - 7</td>
                                            <td>#455</td>
                                            <td>Rs. 4565</td>
                                            <td>9834</td>
                                            <td>Rs. 129384</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5 ">
                                <div class="product-sales-chart">
                                    <div class="portlet-title">
                                        <div class="chart-box chart-box-1 chart-box show" id="newpost">
                                            <h4 class="text-center">Total Order Chart</h4>
                                            <div class="myChartDiv">
                                                <div id="chart_div"></div>
                                            </div>
                                        </div>
                                        <div class="chart-box chart-box-2" id="newpost2">
                                            <div class="chart">
                                                <h2 class="text-center"> Brand Store</h2>
                                                <div class="d-flex justify-content-center">
                                                    <div id="myPlot2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart-box chart-box-3" id="newpost3">
                                            <div class="chart">
                                                <h2 class="text-center">Fixed Price :-</h2>
                                                <div class="d-flex justify-content-center">
                                                    <div id="myPlot"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart-box chart-box-4" id="newpost4">
                                            <div class="chart">
                                                <h2 class="text-center">Feedback</h2>
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
                    </div>
                </div>
                <!-- custom-end -->




                <!-- footer include start -->
                <?php include "footer.php" ?>
                <!-- footer include end -->
            </main>

        </div>
    </div>
    <!-- Jquery -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="./assets/js/revenue-chart.js"></script>
    <script src="./assets/js/sale-chart.js"></script>
    <script src="./assets/js/total-order-chart.js"></script>
    <script src="./assets/js/short-chart.js"></script>
    <script src="./assets/js/product-chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

    <script src="./assets/js/main.js"></script>


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


    <!-- date range first start -->
    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
    <!-- date range first End -->


    <!-- date range second start -->


    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange1').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
    <!-- date range second end -->

    <!-- date range third start -->

    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange2').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
    <!-- date range third end -->

    <!-- date range fourth start -->

    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange3 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange3').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>

    <!-- date range fourth End -->


</body>

</html>