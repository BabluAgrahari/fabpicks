<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap css -->
    <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" />


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <style>
        body {
            height: 100%;
            font-family: roboto, sans-serif;
            font-weight: 400;
            background: #152036;
            color: white;
        }

        .analysis-progrebar-ctn {
            padding: 20px;
            background: #1b2a47
        }

        .analysis-progrebar-ctn h4,
        .tranffic-als-inner h3 {
            font-size: 20px;
            color: #fff;
            text-transform: capitalize
        }

        .analysis-progrebar-ctn .progress {
            height: 5px;
            margin-top: 5px;
            margin-bottom: 0
        }

        .progress {
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
            box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
        }

        .col-xs-3 {
            width: 25%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .text-left {
            text-align: left;
        }

        .col-xs-9 {
            width: 75%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        .breadcome-list {
            padding: 20px;
            background: #1b2a47;
            margin: 30px 0;
        }

        .col-lg-6 {
            float: left;
        }

        .breadcomb-wp {
            display: flex;
        }

        .breadcomb-report {
            text-align: right;
            margin: 5px 0;
        }

        .breadcomb-report button {
            background: #152036;
        }

        .bg-green {
            background: #24caa1;
        }

        .bg-red {
            background: #eb4b4b;
        }

        .bg-blue {
            background: #2eb7f3;
        }

        .bg-purple {
            background: #805bbe;
        }

        .product-sales-chart,
        .analytics-info-cs,
        .tranffic-als-inner,
        .analytics-rounded,
        .single-new-trend,
        .personal-info-wrap,
        .author-widgets-single,
        .calender-inner,
        .product-status-wrap,
        .review-tab-pro-inner,
        .income-dashone-total,
        .analytics-nalika-wrap,
        .analytics-sparkle-line,
        .analysis-progrebar,
        .sparkline8-list,
        .sparkline9-list,
        .sparkline7-list,
        .sparkline10-list,
        .sparkline12-list,
        .sparkline13-list,
        .sparkline14-list,
        .sparkline13-list,
        .sparkline11-list,
        .x-editable-list,
        .code-editor-single,
        .blog-details-inner,
        .charts-single-pro,
        .about-sparkline,
        .sparkline-list,
        .button-ad-wrap,
        .tab-content-details,
        .sparkline16-list,
        .sparkline15-list,
        .tinymce-single {
            padding: 20px;
            background: #1b2a47;
        }

        .portlet-title {
            margin-bottom: 20px;
        }

        div#sparklinehome canvas {
            width: 100% !important;
        }

        .mg-b-30 {
            margin-bottom: 30px;
        }

        .product-sales-chart,
        .analytics-info-cs,
        .tranffic-als-inner,
        .analytics-rounded,
        .single-new-trend,
        .personal-info-wrap,
        .author-widgets-single,
        .calender-inner,
        .product-status-wrap,
        .review-tab-pro-inner,
        .income-dashone-total,
        .analytics-nalika-wrap,
        .analytics-sparkle-line,
        .analysis-progrebar,
        .sparkline8-list,
        .sparkline9-list,
        .sparkline7-list,
        .sparkline10-list,
        .sparkline12-list,
        .sparkline13-list,
        .sparkline14-list,
        .sparkline13-list,
        .sparkline11-list,
        .x-editable-list,
        .code-editor-single,
        .blog-details-inner,
        .charts-single-pro,
        .about-sparkline,
        .sparkline-list,
        .button-ad-wrap,
        .tab-content-details,
        .sparkline16-list,
        .sparkline15-list,
        .tinymce-single {
            padding: 20px;
            background: #1b2a47;
        }

        .hidden {
            display: none;
        }
    </style>
</head>