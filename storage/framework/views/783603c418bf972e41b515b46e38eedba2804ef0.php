<?php echo $__env->make('crm.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .text-danger {
        color: red !important;
        font-size: 14px !important;
    }
</style>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!-- header include start -->
        <?php echo $__env->make('crm.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- header include end -->
        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <header class="header">
                <div class="dashboard-left-side">
                    <a id="btn-collapse" href="#">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-lg">
                        <i class="ri-menu-line ri-xl"></i>
                    </a>

                </div>

                <div class="dashboard-right-container">
                    <div class="dashboard-notification">
                        <i class='bx bx-bell'></i>
                        <span class="notification-number">1</span>
                    </div>
                    <div class="dashboard-account">
                        <div class="profile-pic">
                            <img src="<?php echo e(defaultImg()); ?>" class="img-fluid" alt="">
                        </div>


                        <div class="user-profile-container ">
                            <div class="user-profile-pic">
                                <div class="user-profile-img">
                                    <img src="<?php echo e(defaultImg()); ?>" class="img-fluid" alt="">
                                </div>

                                <div class="user-name">
                                    <p> <?php echo e(ucwords(Auth::user()->name)); ?></p>
                                </div>
                            </div>

                            <div class="user-profile-view">
                                <a href="<?php echo e(url('crm/profile')); ?>">
                                    <div class="user-profile-view-box">
                                        <div class="user-profile-icon">
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                        <div class="user-profiel-text">
                                            <p>Profile</p>
                                            <span>View your profile</span>
                                        </div>
                                    </div>

                                </a>
                            </div>
                            <a href="<?php echo e(url('crm/logout')); ?>" class="logout-btn">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </a>
                        </div>

                        <!-- <div class="dropdown account-dropdown">
                    <button class="btn  dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sunil Kumar
                    </button>
                    

                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Profile</button></li>
                        <li><button class="dropdown-item" type="button">Setting</button></li>
                        <li><button class="dropdown-item" type="button">Logout</button></li>
                    </ul>
                </div> -->

                    </div>
                </div>
            </header>
            <main class="content">
                <!-- content include start -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- content include end -->

                <!-- footer include start -->
                <?php echo $__env->make('crm.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- footer include end -->
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script src="<?php echo e(asset('assets')); ?>/js/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/tags.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/main.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/texteditor.js"></script>

    <script>
        function alertMsg(status, msg, delay = 1000, remove = false) {

            let classN = status ? 'success' : 'danger';
            let selector = remove ? 'messageRemove' : 'message';
            let icon = status ? '<i class="fa-regular fa-circle-check"></i>' : '<i class="fa-regular fa-circle-xmark"></i>';
            // if(customSelector)
            // let selector = customSelector;


            $('#' + selector).html(`<div class="alert alert-box alert-${classN} d-flex align-items-center w-100" role="alert">
           ${icon}
            <div class="alr-mgs"> <p>${msg}</p></div></div>`).fadeIn();
            setTimeout(function() {
                $('#' + selector).fadeOut('slow');
            }, delay)
        }


        function removeRecord(tr, url) {

            if (confirm('Are you sure, you want to remove it.')) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        _method: 'delete'
                    },

                    success: function(res) {
                        if (res.status) {
                            tr.fadeOut('slow', () => {
                                $(tr).remove();
                            })
                        }
                        alertMsg(res.status, res.msg, 2000, true);
                    }
                });

            }
        }

        function defaultImg(size = '100x100') {
            return `https://via.placeholder.com/${size}`;
        }

        $('.modal').on('hidden.bs.modal', function() {
            location.reload();
        })


        //filter open and close
        $('#filter-btn').click(function() {
            $('#filter').toggle();
            if ($(this).text().trim() === "Filter") {
                $(this).html('<i class="far fa-times-circle"></i>&nbsp;Close');
            } else if ($(this).text().trim() === 'Close') {
                $(this).html('<i class="fas fa-filter"></i>&nbsp;Filter');
            }
        })
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        //popover
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });


        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //show file name
        $(document).on('change', 'input[type=file]', function() {
            var fileName = this.files[0].name;
            $(this).parent().find('label').html(fileName);
        })

        /*start single image preview*/
        $(document).on('change', '#imgInp', function() {
            var fileName = imgInp.files[0].name;
            $('.file-name').html(fileName);
            const [file] = imgInp.files
            if (file) {
                $('#avatar').show();
                avatar.src = URL.createObjectURL(file)
            }
        });
        /*end single image preview*/
    </script>
    <?php echo $__env->yieldPushContent('modal'); ?>;
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldPushContent('pagination-js'); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\fabpic-git\resources\views/crm/layout/app.blade.php ENDPATH**/ ?>