<aside id="sidebar" class="sidebar break-point-lg has-bg-image collapsed">

    <div class="sidebar-layout">
        <div class="sidebar-header">
            <span style="
         text-transform: uppercase;
         font-size: 15px;
         letter-spacing: 3px;
         font-weight: bold;
       ">Fabpiks</span>
        </div>
        <div class="sidebar-content">
            <nav class="menu open-current-submenu">
                <ul>

                    <li class="menu-item ">
                        <a href="{{url('crm/dashboard')}}">
                            <span class="menu-icon">
                                <i class="ri-bar-chart-fill"></i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    @can('isClient')
                    <li class="menu-item">
                        <a href="{{url('crm/brand')}}" class="active">
                            <span class="menu-icon">
                                <i class="ri-shopping-bag-line"></i>
                            </span>
                            <span class="menu-title">Brand</span>
                        </a>
                    </li>
                    @endcan
                    @can('isAdmin')
                    <li class="menu-item sub-menu">
                        <a href="javascript:void">
                            <span class="menu-icon">
                                <i class="ri-shopping-bag-line"></i>
                            </span>
                            <span class="menu-title">Catalog</span>
                        </a>
                        <div class="sub-menu-list">
                            <ul>

                                <li class="menu-item">
                                    <a href="{{url('crm/product')}}">
                                        <span class="menu-title">Product</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/category')}}">
                                        <span class="menu-title">Category</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('crm/sub-category')}}">
                                        <span class="menu-title">Sub Category</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/attribute')}}">
                                        <span class="menu-title">Attribute</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/sub-attribute')}}">
                                        <span class="menu-title">Sub Attribute</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/brand')}}" class="active">
                                        <span class="menu-title">Brand</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  ">
                        <a href="{{url('crm/client')}}">
                            <span class="menu-icon">
                                <i class="ri-user-line"></i>
                            </span>
                            <span class="menu-title">Client</span>
                        </a>
                    </li>
                    @endcan

                    <li class="menu-item ">
                        <a href="{{url('crm/order')}}">
                            <span class="menu-icon">
                                <i class="ri-book-line"></i>
                            </span>
                            <span class="menu-title">Orders</span>
                        </a>
                    </li>

                    @can('isAdmin')
                    <li class="menu-item ">
                        <a href="{{url('crm/user')}}">
                            <span class="menu-icon">
                                <i class="ri-user-line"></i>
                            </span>
                            <span class="menu-title">Customer</span>
                        </a>
                    </li>
                    @endcan

                    <li class="menu-item ">
                        <a href="{{url('crm/survay')}}">
                            <span class="menu-icon">
                                <i class="ri-booklet-line"></i>
                            </span>
                            <span class="menu-title">Survay Questions</span>
                        </a>
                    </li>

                    @can('isAdmin')
                    <li class="menu-item ">
                        <a href="{{url('crm/feedback')}}">
                            <span class="menu-icon">
                                <i class="ri-booklet-line"></i>
                            </span>
                            <span class="menu-title">Feedback</span>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="{{url('crm/push-notification')}}">
                            <span class="menu-icon">
                                <i class="ri-notification-4-line"></i>
                            </span>
                            <span class="menu-title">Push Notification</span>
                        </a>
                    </li>

                    <li class="menu-item sub-menu">
                        <a href="#">
                            <span class="menu-icon">
                                <i class="ri-settings-2-line"></i>
                            </span>
                            <span class="menu-title">Settings</span>
                        </a>
                        <div class="sub-menu-list">
                            <ul>
                                <li class="menu-item">
                                    <a href="{{url('crm/general')}}">
                                        <span class="menu-title">General Settings</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('crm/aboutus')}}">
                                        <span class="menu-title">About Us</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('crm/privacy')}}">
                                        <span class="menu-title">Privacy Policy</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('crm/conditions')}}">
                                        <span class="menu-title">Teams and Conditions</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{url('crm/refund')}}">
                                        <span class="menu-title">Refund Policy</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/coupon')}}">
                                        <span class="menu-title">Coupon</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/banner')}}">
                                        <span class="menu-title">Banner</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{url('crm/shipping-cost')}}">
                                        <span class="menu-title">Shipping Cost</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endcan
                </ul>
            </nav>
        </div>
        <div class="sidebar-footer"><span><a href="#">Help</a> <a href="#">Contact us</a> <a href="#"><i class="ri-logout-box-r-line"></i> Logout</a></span></div>
    </div>
</aside>