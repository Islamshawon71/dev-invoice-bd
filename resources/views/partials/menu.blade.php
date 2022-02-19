<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route("admin.home") }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">{{ trans('global.dashboard') }}</span>
                    </a>
                </li>

                @can('user_management_access')
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="user"></i>
                        <span data-key="t-apps">{{ trans('cruds.userManagement.title') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('permission_access')
                        <li>
                            <a href="{{ route("admin.permissions.index") }}">
                                <span data-key="t-calendar">{{ trans('cruds.permission.title') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('role_access')
                        <li>
                            <a href="{{ route("admin.roles.index") }}">
                                <span data-key="t-chat">{{ trans('cruds.role.title') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('user_access')
                        <li>
                            <a href="{{ route("admin.users.index") }}">
                                <span data-key="t-chat">{{ trans('cruds.user.title') }}</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan

                @can('shop_access')
                <li>
                    <a href="{{ route("admin.shops.index") }}">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.shop.title') }}</span>
                    </a>
                </li>
                @endcan

                @can('product_access')
                <li>
                    <a href="{{ route("admin.products.index") }}">
                        <i data-feather="package"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.product.title') }}</span>
                    </a>
                </li>
                @endcan

                @can('customer_access')
                <li>
                    <a href="{{ route("admin.customers.index") }}">
                        <i data-feather="users"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.customer.title') }}</span>
                    </a>
                </li>
                @endcan
                @can('order_access')
                <li>
                    <a href="{{ route("admin.orders.index") }}">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.order.title') }}</span>
                    </a>
                </li>
                @endcan
                @can('courier_access')
                <li>
                    <a href="{{ route("admin.couriers.index") }}">
                        <i data-feather="truck"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.courier.title') }}</span>
                    </a>
                </li>
                @endcan

                @can('send_sms_access')
                <li>
                    <a href="{{ route("admin.send-sms.index") }}">
                        <i data-feather="send"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.sendSms.title') }}</span>
                    </a>
                </li>
                @endcan

                @can('setting_access')
                <li>
                    <a href="{{ route("admin.settings.index") }}">
                        <i data-feather="settings"></i>
                        <span data-key="t-horizontal">{{ trans('cruds.setting.title') }}</span>
                    </a>
                </li>
                @endcan



                @can('inventory_access')
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="archive"></i>
                        <span data-key="t-apps">{{ trans('cruds.inventory.title') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('product_purchase_access')
                        <li>
                            <a href="{{ route("admin.product-purchases.index") }}">
                                <span data-key="t-calendar">{{ trans('cruds.productPurchase.title') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('stock_access')
                        <li>
                            <a href="{{ route("admin.stocks.index") }}">
                                <span data-key="t-chat">{{ trans('cruds.stock.title') }}</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan


                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li>
                            <a href="{{ route("profile.password.edit") }}">
                                <i data-feather="key"></i>
                                <span data-key="t-horizontal">{{ trans('global.change_password') }}</span>
                            </a>
                        </li>
                    @endcan
                @endif

                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i data-feather="log-out"></i>
                        <span data-key="t-horizontal">{{ trans('global.logout') }}</span>
                    </a>
                </li>


            </ul>

            <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="{{ asset('assets/images/giftbox.png') }}" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                        <a href="#!" class="btn btn-sm btn-primary mt-2">Upgrade Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>
