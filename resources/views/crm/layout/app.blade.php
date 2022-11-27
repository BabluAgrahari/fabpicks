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
                        <i class='bx bx-bell text-white'></i>
                        <span class="notification-number">1</span>
                    </div>
                    <div class="dashboard-account">
                        <div class="profile-pic">
                            <img src="./assets/img/user/user.jpg" class="img-fluid" alt="">
                        </div>


                        <div class="dropdown account-dropdown">
                            <button class="btn  dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ucwords(Auth::user()->name)}}
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Profile</button></li>
                                <li><button class="dropdown-item" type="button">Setting</button></li>
                                <li><button class="dropdown-item" type="button"> <a href="{{url('crm/logout')}}">logout</a> </button></li>
                            </ul>
                        </div>

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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

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

        function defaultImg(size='100x100'){
            return `https://via.placeholder.com/${size}`;
        }
    </script>
    @stack('modal');
    @stack('js')

</body>

</html>