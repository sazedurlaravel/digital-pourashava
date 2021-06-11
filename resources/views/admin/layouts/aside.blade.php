<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        {{-- <img src="#" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">
            <i class="fas fa-truck mr-2"></i>
            {{ config('app.name') }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <x-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> ড্যাশবোর্ড </p>
                    </x-nav-link>
                </li>


               <!-- <li class="nav-item">
                    <x-nav-link :href="route('admin.information.create')" :active="request()->routeIs('admin.information.create')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> main Page </p>
                    </x-nav-link>
                </li> --> 
                {{-- Staff menu --}}
                @if(auth()->user()->hasRole('super_admin'))
                <li class="nav-item @if(request()->routeIs('admin.pourashava_admins.*')) menu-open @endif">
                        <x-nav-link href="#" :active="request()->routeIs('admin.pourashava_admins.*')">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                পৌরসভা অ্যাডমিন
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </x-nav-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.pourashava_admins.create')" :active="request()->routeIs('admin.pourashava_admins.create')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> নতুন অ্যাডমিন </p>
                                </x-nav-link>
                                <x-nav-link :href="route('admin.pourashava_admins.index')" :active="request()->routeIs('admin.pourashava_admins.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> অ্যাডমিনের তালিকা </p>
                                </x-nav-link>
                                <x-nav-link :href="route('admin.pourashava_admins.deactive')" :active="request()->routeIs('admin.pourashava_admins.deactive')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> ডিঅ্যাকটিভ তালিকা </p>
                                </x-nav-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(request()->routeIs('admin.pourashava_admin_wallets.*')) menu-open @endif">
                        <x-nav-link href="#" :active="request()->routeIs('admin.pourashava_admin_wallets.*')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                <i class="fas fa-angle-left right"></i>
                                ই-ওয়ালেট
                            </p>
                        </x-nav-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.wallets.index')" :active="request()->routeIs('admin.wallets.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> ওয়ালেট রিকুয়েস্ট</p>
                                </x-nav-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item @if(request()->routeIs('admin.settings*')) menu-open @endif">
                        <x-nav-link href="#" :active="request()->routeIs('admin.settings*')">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                সেটিংস
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </x-nav-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.divisions.index')" :active="request()->routeIs('admin.settings.divisions.*')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> বিভাগ </p>

                                </x-nav-link>
                            </li>


                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.zilas.index')" :active="request()->routeIs('admin.settings.zilas.*')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> জেলা </p>
                                </x-nav-link>
                            </li>

                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.pourashavas.index')" :active="request()->routeIs('admin.settings.pourashavas.*')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> পৌরসভা </p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.user-card.index')" :active="request()->routeIs('admin.settings.user-card.*')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> ব্যবহারকারীর কার্ড </p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.information.index')" :active="request()->routeIs('admin.information.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>তথ্য</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.sebas.index')" :active="request()->routeIs('admin.sebas.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>সেবা</p>
                                </x-nav-link>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Digital Center Admins --}}
                @if(auth()->user()->hasRole('pourashava_admin'))
                <li class="nav-item @if(request()->routeIs('admin.digital_center_admins.*')) menu-open @endif">
                    <x-nav-link href="#" :active="request()->routeIs('admin.digital_center_admins.*')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            ডিজিটাল সেন্টার
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </x-nav-link>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-nav-link :href="route('admin.digital_center_admins.create')" :active="request()->routeIs('admin.digital_center_admins.create')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> নতুন ডিজিটাল সেন্টার </p>
                            </x-nav-link>

                            <x-nav-link :href="route('admin.digital_center_admins.index')" :active="request()->routeIs('admin.digital_center_admins.index')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ডিজিটাল সেন্টার তালিকা </p>
                            </x-nav-link>
                        </li>
                    </ul>
                </li>

                


                <li class="nav-item @if(request()->routeIs('admin.settings*')) menu-open @endif">
                    <x-nav-link href="#" :active="request()->routeIs('admin.settings*')">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            সেটিংস
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </x-nav-link>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-nav-link :href="route('admin.settings.wardnumbers.index')" :active="request()->routeIs('admin.settings.wardnumbers.*')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ওয়ার্ড নাম্বার </p>
                            </x-nav-link>

                            <x-nav-link :href="route('admin.settings.villages.index')" :active="request()->routeIs('admin.settings.villages.*')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> গ্রাম </p>
                            </x-nav-link>

                            <x-nav-link :href="route('admin.settings.ownerships.index')" :active="request()->routeIs('admin.settings.ownerships.*')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ব্যবসার মালিকানার ধরণ </p>
                            </x-nav-link>
                            <x-nav-link :href="route('admin.settings.business_types.index')" :active="request()->routeIs('admin.settings.business_types.*')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ব্যবসার ধরণ </p>
                            </x-nav-link>

                            <x-nav-link :href="route('admin.settings.capital_ranges.index')" :active="request()->routeIs('admin.settings.capital_ranges.*')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ব্যবসার মূলধন পরিসর </p>
                            </x-nav-link>

                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.pourashava_informations.index')" :active="request()->routeIs('admin.pourashava_informations.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>তথ্য</p>
                                </x-nav-link>
                            </li>

                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.main_mayors.index')" :active="request()->routeIs('admin.main_mayors.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>মেয়র</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.mayor_lists.index')" :active="request()->routeIs('admin.mayor_lists.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>মেয়রবৃন্দ</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.counselor_lists.index')" :active="request()->routeIs('admin.settings.counselor_lists.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>কাউন্সিলরবৃন্দ</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.important_links.index')" :active="request()->routeIs('admin.settings.important_links.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>গুরুত্বপূর্ণ লিঙ্ক</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.important_applications.index')" :active="request()->routeIs('admin.settings.important_applications.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>গুরুত্বপূর্ণ  প্রয়োগ</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.notics.index')" :active="request()->routeIs('admin.settings.notics.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>নোটিশ</p>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link :href="route('admin.settings.sliders.index')" :active="request()->routeIs('admin.settings.sliders.index')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>স্লাইডার</p>
                                </x-nav-link>
                            </li>
                        </li>
                    </ul>
                </li>
             @endif

            @if(auth()->user()->hasRole('pourashava_admin') || auth()->user()->hasRole('digital_center_admin'))
            <li class="nav-item @if(request()->routeIs('admin.pourashava_admin_wallets.*')) menu-open @endif">
                <x-nav-link href="#" :active="request()->routeIs('admin.pourashava_admin_wallets.*')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        <i class="fas fa-angle-left right"></i>
                        ই-ওয়ালেট
                    </p>
                </x-nav-link>
                <ul class="nav nav-treeview">
                    @if(auth()->user()->hasRole('pourashava_admin'))
                    <li class="nav-item">
                        <x-nav-link :href="route('admin.pourashava_admin_wallets.index')" :active="request()->routeIs('admin.pourashava_admin_wallets.index')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>মাই ওয়ালেট</p>
                        </x-nav-link>
                    </li>
                    @endif
                    <li class="nav-item">
                        <x-nav-link :href="route('admin.pourashava_admin_wallets.get_request')" :active="request()->routeIs('admin.pourashava_admin_wallets.get_request')">
                            <i class="far fa-circle nav-icon"></i>
                            <p> ওয়ালেট রিকুয়েস্ট</p>
                        </x-nav-link>
                    </li>
                    @if(auth()->user()->hasRole('pourashava_admin'))
                    <li class="nav-item">
                        <x-nav-link href="#" active="">
                            <i class="far fa-circle nav-icon"></i>
                            <p> কালেকশান হিস্টরি </p>
                        </x-nav-link>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('pourashava_admin') || auth()->user()->hasRole('digital_center_admin'))
            <li class="nav-item @if(request()->routeIs('admin.business_holders.*')) menu-open @endif">
                <x-nav-link href="#" :active="request()->routeIs('admin.business_holders.*')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        ব্যবসায়িক হোলল্ডার্স
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </x-nav-link>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        @can('create_user')
                            <x-nav-link :href="route('admin.business_holders.create')" :active="request()->routeIs('admin.business_holders.create')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> নতুন ব্যবহারকারী </p>
                            </x-nav-link>
                        
                        @endcan
                       
                        @can('view_user')
                            <x-nav-link :href="route('admin.business_holders.index')" :active="request()->routeIs('admin.business_holders.index')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ব্যবহারকারীর তালিকা </p>
                            </x-nav-link>
                            <x-nav-link href="#" :active="request()->routeIs('admin.business_holders.deactive')">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ডিঅ্যাকটিভ তালিকা </p>
                            </x-nav-link>
                        @endcan

                    
                    </li>
                </ul>
            </li>
            @endif

            @if(auth()->user()->hasRole('pourashava_admin') || auth()->user()->hasRole('digital_center_admin'))
            <li class="nav-item @if(request()->routeIs('admin.user_licenses.*')) menu-open @endif">
                <x-nav-link href="#" :active="request()->routeIs('admin.user_licenses.*')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        <i class="fas fa-angle-left right"></i>
                        লাইসেন্স
                    </p>
                </x-nav-link>
                <ul class="nav nav-treeview">
                   
                    <li class="nav-item">
                        <x-nav-link :href="route('admin.user_license.index')" :active="request()->routeIs('admin.user_license.index')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>লাইসেন্স আবেদন</p>
                        </x-nav-link>
                    </li>
                    
                   
                </ul>
            </li>

            @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
