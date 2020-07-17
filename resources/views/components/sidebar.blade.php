<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">

                <li class="sidebar-item {{request()->is('_admin') ? 'selected' : ''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->is('_admin') ? 'active' : ''}}"
                        href="{{route('admin.index')}}" aria-expanded="false">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{request()->routeIs('admin.supplier.*') ? 'selected' : ''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('admin.supplier.*') ? 'active' : ''}}"
                        href="{{route('admin.supplier.index')}}" aria-expanded="false">
                        <i class="mdi mdi-truck"></i>
                        <span class="hide-menu">Supplier</span>
                    </a>
                </li>

                <li class="sidebar-item {{request()->is('_admin/produk*') ? 'selected' : ''}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark {{request()->routeIs('_admin/produk*') ? 'active' : ''}}"
                        href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-leaf"></i>
                        <span class="hide-menu">Produk </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{request()->is('_admin/produk*') ? 'in' : ''}}">

                        <li class="sidebar-item">
                            <a href="{{route('admin.product.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.product*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Semua produk
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.prod.category.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.prod.category*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Kategori
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.prod.subcategory.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.prod.subcategory*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Sub kategori
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.prod.type.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.prod.type*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Jenis
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.prod.subtype.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.prod.subtype*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Sub jenis
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item {{request()->is('_admin/fitur*') ? 'selected' : ''}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark {{request()->routeIs('_admin/fitur*') ? 'active' : ''}}"
                        href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-magnet-on"></i>
                        <span class="hide-menu">Fitur </span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{request()->is('_admin/fitur*') ? 'in' : ''}}">

                        <li class="sidebar-item">
                            <a href="{{route('admin.features.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.features.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Semua fitur
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.feat.category.index')}}"
                                class="sidebar-link {{request()->routeIs('admin.feat.category.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Kategori
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
