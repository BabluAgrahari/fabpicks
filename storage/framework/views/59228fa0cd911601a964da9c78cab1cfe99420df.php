<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Design</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/css-pro-layout.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/remixicon.css" />
    <!-- Font Awesome  -->
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/style.css" />

    <style>
        .status-box {
            border-radius: 50px;
            display: inline-block;
            font-size: 12px;
            padding: 2px 15px;
            text-align: center;
        }

        .status-box.failed {
            background-color: #eb9d68;
        }

        .status-box.pending {
            background-color: #e4cf8e;
        }

        .status-box.success {
            background-color: #9ad6c0;
        }
    </style>
</head><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/layout/header.blade.php ENDPATH**/ ?>