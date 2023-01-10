<style>
    /* .tooltip-inner {
        background-color: #03bd8b;
    }

    .tooltip.bs-tooltip-right .tooltip-arrow::before {
        border-right-color: #03bd8b !important;
    }

    .tooltip.bs-tooltip-left .tooltip-arrow::before {
        border-left-color: #03bd8b !important;
    }

    .tooltip.bs-tooltip-bottom .tooltip-arrow::before {
        border-bottom-color: #03bd8b !important;
    }

    .tooltip.bs-tooltip-top .tooltip-arrow::before {
        border-top-color: #03bd8b !important;
    } */
</style>

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
                        <a href="{{url('crm/dashboard')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard">
                            <span class="menu-icon">
                                <i class="ri-bar-chart-fill"></i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    @can('isClient')
                    <li class="menu-item">
                        <a href="{{url('crm/brand')}}" class="active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Brand">
                            <span class="menu-icon">
                                <i class="ri-shopping-bag-line"></i>
                            </span>
                            <span class="menu-title">Brand</span>
                        </a>
                    </li>
                    @endcan
                    @can('isAdmin')
                    <li class="menu-item sub-menu">
                        <a href="javascript:void" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Catalog">
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

                                <li class="menu-item">
                                    <a href="{{url('crm/topic')}}" class="active">
                                        <span class="menu-title">Topic</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  ">
                        <a href="{{url('crm/client')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Client">
                            <span class="menu-icon">
                                <i class="ri-user-line"></i>
                            </span>
                            <span class="menu-title">Client</span>
                        </a>
                    </li>
                    @endcan

                    <li class="menu-item ">
                        <a href="{{url('crm/order')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Order">
                            <span class="menu-icon">
                            <i class="fa-brands fa-first-order"></i>
                            </span>
                            <span class="menu-title">Orders</span>
                        </a>
                    </li>

                    @can('isAdmin')
                    <li class="menu-item ">
                        <a href="{{url('crm/user')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customer">
                            <span class="menu-icon">
                            <i class="fa-solid fa-users"></i>
                            </span>
                            <span class="menu-title">Customer</span>
                        </a>
                    </li>
                    @endcan

                    <li class="menu-item ">
                        <a href="{{url('crm/survay')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Survay Question">
                            <span class="menu-icon">
                            <i class="fa-solid fa-circle-question"></i>
                            </span>
                            <span class="menu-title">Survay Questions</span>
                        </a>
                    </li>

                    @can('isAdmin')
                    <li class="menu-item ">
                        <a href="{{url('crm/feedback')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Feedback">
                            <span class="menu-icon">
                            <i class="fa-solid fa-comments"></i>
                            </span>
                            <span class="menu-title">Feedback</span>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="{{url('crm/push-notification')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Push Notification">
                            <span class="menu-icon">
                            <i class="fa-solid fa-bell"></i>
                            </span>
                            <span class="menu-title">Push Notification</span>
                        </a>
                    </li>

                    <li class="menu-item sub-menu">
                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings">
                            <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
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

                                <li class="menu-item">
                                    <a href="{{url('crm/tax')}}">
                                        <span class="menu-title">TAX</span>
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