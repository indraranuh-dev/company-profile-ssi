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

                <li class="sidebar-item {{request()->routeIs('admin.category*') ? 'active' : ''}}">
                    <a href="javascript:void(0)" class="sidebar-link has-arrow waves-effect waves-dark ">
                        <i class="mdi mdi-layers"></i>
                        <span class="hide-menu">Kategori Produk</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{request()->is('_admin/kategori*') ? 'in' : ''}}">
                        <li class="sidebar-item">
                            <a href="{{route('admin.category.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.category*') ? 'active' : ''}}">
                                <span class="hide-menu">Kategori Produk</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.category.subcategory.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.category.subcategory*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Sub kategori
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="sidebar-item {{request()->is('_admin/produk*') ? 'selected' : ''}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark {{request()->routeIs('_admin/produk*') ? 'active' : ''}}"
                        href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-leaf"></i>
                        <span class="hide-menu">HVAC</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{request()->is('_admin/produk*') ? 'in' : ''}}">

                        <li class="sidebar-item">
                            <a href="{{route('admin.product.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.product*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Semua produk
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.prod.type.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.prod.type*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Jenis
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.prod.subtype.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.prod.subtype*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Sub jenis
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item {{request()->routeIs('admin.gs*') ? 'selected' : ''}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark {{request()->routeIs('admin.gs*') ? 'active' : ''}}"
                        href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-wrench"></i>
                        <span class="hide-menu">General Supplies</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{request()->is('_admin/japan-air-filter*') ? 'in' : ''}}">

                        <li class="sidebar-item">
                            <a href="{{route('admin.gs.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.gs.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Semua produk
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.gs-category.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.gs-category.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Kategori
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item {{request()->routeIs('admin.jaf*') ? 'selected' : ''}}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark {{request()->routeIs('admin.jaf*') ? 'active' : ''}}"
                        href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-fw fa-filter"></i>
                        <span class="hide-menu">Japan Air Filter</span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level {{request()->is('_admin/japan-air-filter*') ? 'in' : ''}}">

                        <li class="sidebar-item">
                            <a href="{{route('admin.jaf.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.jaf.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Semua produk
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.jaf-category.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.jaf-category.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Kategori
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
                                class="sidebar-link ml-4 {{request()->routeIs('admin.features.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Semua fitur
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('admin.feat.category.index')}}"
                                class="sidebar-link ml-4 {{request()->routeIs('admin.feat.category.*') ? 'active' : ''}}">
                                <span class="hide-menu">
                                    Kategori
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item {{request()->routeIs('admin.tag*') ? 'selected' : ''}}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('admin.tag*') ? 'active' : ''}}"
                        href="{{route('admin.tag.index')}}" aria-expanded="false">
                        <i class="fa fa-fw fa-hashtag"></i>
                        <span class="hide-menu">Tag</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
