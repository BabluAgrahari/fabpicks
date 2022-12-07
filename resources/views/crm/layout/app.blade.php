@include('crm.layout.header')

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
                            <img src="{{defaultImg()}}" class="img-fluid" alt="">
                        </div>


                        <div class="user-profile-container ">
                            <div class="user-profile-pic">
                                <div class="user-profile-img">
                                    <img src="{{defaultImg()}}" class="img-fluid" alt="">
                                </div>

                                <div class="user-name">
                                    <p> {{ucwords(Auth::user()->name)}}</p>
                                </div>
                            </div>

                            <div class="user-profile-view">
                                <a href="user-profile.php">
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
   
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="{{asset('assets')}}/js/texteditor.js"></script>

    <script>
        function alertMsg(status, msg, delay = 1000, remove = false) {

            let classN = status ? 'success' : 'danger';
            let selector = remove ? 'messageRemove' : 'message';
            // if(customSelector)
            // let selector = customSelector;

            $('#' + selector).html(`<div class="alert alert-${classN} alert-dismissible fade show" role="alert">
                    <strong>${msg}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`).fadeIn();
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
    @stack('modal');
    @stack('js')
    @stack('pagination-js')

</body>

</html>