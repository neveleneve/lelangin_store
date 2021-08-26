<div class="row mb-3 jsutify-content-center">
    <div class="col-12">
        <ul class="nav nav-tabs bg-dark justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('/') ? 'font-weight-bold' : null }}"
                    href="{{ route('dashboard') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('categories*') || Request::is('category*') ? 'font-weight-bold' : null }}"
                    href="{{ route('category') }}">Kategori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('brand*') ? 'font-weight-bold' : null }}"
                    href="{{ route('brand') }}">Brand</a>
            </li>            
        </ul>
    </div>
</div>
