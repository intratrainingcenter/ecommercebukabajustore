 <ul>
    <li>
        <a href="{{route('dashboardIndex')}}" class="waves-effect">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Dashboard <span class="badge badge-primary pull-right">8</span></span>
        </a>
    </li>

     <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> User </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('positionIndex')}}">Position User</a></li>
            <li><a href="{{route('userIndex')}}">Data User</a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Product </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('categoryIndex')}}">Category Product</a></li>
            <li><a href="{{route('productIndex')}}">Data Product</a></li>
        </ul>
    </li>
    <li>
        <a href="{{route('promoIndex')}}" class="waves-effect">
            <i class="mdi mdi-cash-100"></i>
            <span> Promo</span>
        </a>
    </li>
     <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-collage"></i> <span> Konten </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('storyIndex')}}">Story</a></li>
            <li><a href="{{route('sliderindex')}}">Slider</a></li>
            <li><a href="{{route('aboutIndex')}}">About</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple"></i> <span> Transaksi </span> </a>
        <ul class="list-unstyled">
            <li><a href="advanced-animation.html">Transaksi Pemesanan</a></li>
            <li><a href="advanced-animation.html">Transaksi Retur</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-line"></i> <span> Laporan </span> </a>
        <ul class="list-unstyled">
            <li><a href="advanced-animation.html">Laporan Barang</a></li>
            <li><a href="advanced-animation.html">Laporan Transaksi</a></li>
            <li><a href="advanced-animation.html">Laporan Keuangan</a></li>
        </ul>
    </li>
     <li>
        <a href="{{route('settingIndex')}}" class="waves-effect">
            <i class="ion-settings"></i>
            <span> Setting </span>
        </a>
    </li>

</ul>
