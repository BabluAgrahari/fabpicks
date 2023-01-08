@include('crm.layout.header')

<style>
    .text-danger {
        color: red !important;
        font-size: 14px !important;
    }

    .avatar {
        width: 180px;
        height: 100px;
    }
</style>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!-- header include start -->
        @include('crm.layout.sidebar')
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
                            <img src="{{Auth::user()->profile_img??defaultImg()}}" class="img-fluid" alt="">
                        </div>


                        <div class="user-profile-container ">
                            <div class="user-profile-pic">
                                <div class="user-profile-img">
                                    <img src="{{Auth::user()->profile_img??defaultImg()}}" class="img-fluid" alt="">
                                </div>

                                <div class="user-name">
                                    <p> {{ucwords(Auth::user()->name)}}</p>
                                </div>
                            </div>

                            <div class="user-profile-view">
                                <a href="{{url('crm/profile')}}">
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
                            <a href="{{url('crm/logout')}}" class="logout-btn">
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
                @yield('content')
                <!-- content include end -->

                <!-- footer include start -->
                @include('crm.layout.footer')
                <!-- footer include end -->
            </main>
            <div class="overlay"></div>
        </div>
    </div>

    <script src="{{asset('assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{asset('assets')}}/js/tags.js"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js"></script>
    <!-- <script src="{{asset('assets')}}/js/texteditor.js"></script> -->
    <script src="{{asset('assets')}}/js/toast/src/jquery.toast.js"></script>
    <!-- <script src="{{asset('assets')}}/js/custom.js"></script> -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script> -->

    <script src="//cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>

    <script>
        function texteditor(selector) {
            $(function() {
                var $ckfield = CKEDITOR.replace(selector);
                $ckfield.on('change', function() {
                    $ckfield.updateElement();
                });
            });
        }

        // function dynamicTextarea(selector) {
        //     CKEDITOR.replace('#test');
        // }
    </script>
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
                        "_token": "{{ csrf_token() }}",
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
            $(this).html(fileName);
        })

        /*start single image preview*/
        $(document).on('change', '.imgInp', function(e) {
            var fileName = e.target.files[0].name;
            $('.file-name').html(fileName);
            const [file] = e.target.files
            if (file)
                avatar.src = URL.createObjectURL(file)
        });
        $(document).on('change', '.imgInp1', function(e) {
            var fileName = e.target.files[0].name;
            $('.file-name').html(fileName);
            const [file] = e.target.files
            if (file)
                avatar1.src = URL.createObjectURL(file)
        });
        /*end single image preview*/

        //for convert into upper case first letter
        function ucwords(str = false) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
        //for update status
        function chagneStatus(id = false, val = false, selector = false, url = false) {

            if (!id || !val || !selector || !url) {
                alert('Invalid Request.');
                return false;
            }
            $.ajax({
                'url': url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'status': val
                },
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    // console.log(res);
                    if (res.val == 1) {
                        $(selector).text('Active').attr('val', '0').removeClass('badge bg-warning').addClass('badge bg-success');
                    } else {
                        $(selector).text('Inactive').attr('val', '1').removeClass('badge bg-success').addClass('badge bg-warning');
                    }
                }
            })
        }

        setTimeout(function() {
            $('.mce-notification-inner').hide();
        }, 5000);
    </script>
    @stack('modal')
    @stack('js')
    @stack('pagination-js')

</body>

</html>