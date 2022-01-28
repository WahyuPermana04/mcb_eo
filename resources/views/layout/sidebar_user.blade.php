</li>
    <li class="nav-item">
    <a class="nav-link" href="/user">
        <i class="icon nalika-table icon-wrap"></i>
        <span class="menu-title">DASHBOARD</span>
    </a>
</li>

<li>
    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-table icon-wrap"></i> <span class="mini-click-non">LAYANAN</span></a>
    <ul class="submenu-angle" aria-expanded="false">
        <li><a title="Peity Charts" href="/item_dokum"><span class="mini-sub-pro">Dokumentasi</span></a></li>
        <li><a title="Data Table" href="/dekor"><span class="mini-sub-pro">Dekorasi</span></a></li>
    </ul>
</li>

</li>
    <li class="nav-item">
    <a class="nav-link" href="/paket">
        <i class="icon nalika-table icon-wrap"></i>
        <span class="menu-title">PAKET</span>
    </a>
</li>

@if(Auth::check())
</li>
    <li class="nav-item">
    <a class="nav-link" href="/formPesan">
        <i class="icon nalika-table icon-wrap"></i>
        <span class="menu-title">PEMESANAN</span>
    </a>
</li>

</li>
    <li class="nav-item">
    <a class="nav-link" href="/history">
        <i class="icon nalika-table icon-wrap"></i>
        <span class="menu-title">HISTORY</span>
    </a>
</li>
@else
</li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">
        <i class="icon nalika-table icon-wrap"></i>
        <span class="menu-title">PEMESANAN</span>
    </a>
</li>
@endif