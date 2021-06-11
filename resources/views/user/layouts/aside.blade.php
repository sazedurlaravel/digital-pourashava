<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('pourashava_frontend.user.home', Request::route('pourashava_slug')) }}" class="brand-link">
        {{-- <img src="#" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">
            <i class="fas fa-truck mr-2"></i>
            {{ config('app.name') }}
        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <x-nav-link :href="route('pourashava_frontend.user.home', Request::route('pourashava_slug'))" :active="request()->routeIs('pourashava_frontend.user.home', Request::route('pourashava_slug'))">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> ড্যাশবোর্ড </p>
                    </x-nav-link>
                </li>


                <li class="nav-item @if(request()->routeIs('pourashava_frontend.user.wallet*')) menu-open @endif">
                    <x-nav-link href="#" :active="request()->routeIs('pourashava_frontend.user.walle.*')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            ই-ওয়ালেট
                        </p>
                    </x-nav-link>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-nav-link :href="route('pourashava_frontend.user.wallet', Request::route('pourashava_slug'))" :active="request()->routeIs('pourashava_frontend.user.wallet')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>মাই ওয়ালেট</p>
                            </x-nav-link>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <x-nav-link :href="route('pourashava_frontend.user.license', Request::route('pourashava_slug'))" :active="request()->routeIs('pourashava_frontend.user.license', Request::route('pourashava_slug'))">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> লাইসেন্স </p>
                    </x-nav-link>
                </li>
            </ul>
        </nav>
    </div>
</aside>
