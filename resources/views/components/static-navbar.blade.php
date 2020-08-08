<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li>
            <a href="{{route('index')}}">Beranda</a>
        </li>
        <li class="{{request()->routeIs('about')? 'active' : ''}}">
            <a href="{{route('about')}}">Tentang Kami</a>
        </li>
        <li class="drop-down">
            <a href="{{route('product.index')}}">Produk</a>
            <ul>
                <li class="drop-down">
                    <a href="{{route('product.hvac.index')}}">HVAC</a>
                    <ul>
                        <li class="drop-down">
                            <a href="{{route('product.hvac.subCategory.index', 'applied')}}">Applied</a>
                            <ul>
                                <li>
                                    <a href="{{route('product.hvac.vendor.index', ['applied', 'daikin'])}}">
                                        Daikin</a>
                                </li>
                                <li>
                                    <a href="{{route('product.hvac.vendor.index', ['applied', 'gree'])}}">
                                        Gree</a>
                                </li>
                            </ul>
                        </li>
                        <li class="drop-down">
                            <a href="{{route('product.hvac.subCategory.index', 'unitary')}}">Unitary</a>
                            <ul>
                                <li>
                                    <a href="{{route('product.hvac.vendor.index', ['unitary', 'daikin'])}}">
                                        Daikin</a>
                                </li>
                                <li>
                                    <a href="{{route('product.hvac.vendor.index', ['unitary', 'gree'])}}">
                                        Gree</a>
                                </li>
                                <li>
                                    <a href="{{route('product.hvac.vendor.index', ['unitary', 'mcquay'])}}">
                                        McQuay</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('product.index')}}">General Supplies</a>
                </li>
                <li class="drop-down">
                    <a href="{{route('product.filtration.index')}}">Filtration</a>
                    <ul>
                        <li>
                            <a href="{{route('product.filtration.supplier.index', 'japan-air-filter')}}">
                                Japan Air Filter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('index')}}">Servis</a>
        </li>
        <li class="{{request()->routeIs('contact*')? 'active' : ''}}">
            <a href="{{route('contact')}}">Hubungi Kami</a>
        </li>
        <li>
            <label for="" class="toggle-search">
                <i class="bx bx-search"></i>
            </label>
        </li>
    </ul>
</nav>
