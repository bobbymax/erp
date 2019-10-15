<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('user.dashboard') }}"><img src="/assets/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{ route('user.dashboard') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>
                    {{--  
                    @if ($modules->count() > 0)
                        @foreach ($modules as $module)
                            @can($module->permission)
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="{{ $module->icon }}"></i><span>{{ $module->name }}</span></a>
                                    @if (is_object($module->menus) && $module->menus->count() > 0)
                                        <ul class="collapse">
                                            @foreach ($module->menus as $menu)
                                                @can($menu->permission)
                                                    <li><a href="{{ route($menu->route) }}">{{ strtolower($menu->name) }}</a></li>
                                                @endcan
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endcan
                        @endforeach
                    @endif
                    --}}

                    @if ($modules->count() > 0)
                        @foreach ($modules as $module)
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="{{ $module->icon }}"></i><span>{{ $module->name }}</span></a>
                                @if (is_object($module->menus) && $module->menus->count() > 0)
                                    <ul class="collapse">
                                        @foreach ($module->menus as $menu)
                                            <li><a href="@can($menu->permission){{ route($menu->route) }}@else javascript:void(0) @endcan">{{ strtolower($menu->name) }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>