 <ul>
    <li>
        <a href="{{route('dashboardIndex')}}" class="waves-effect">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Dashboard <span class="badge badge-primary pull-right">8</span></span>
        </a>
    </li>
    @if (Auth::user()->kode_jabatan == 'admin')
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
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-collage"></i> <span> Content </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('storyIndex')}}">Story</a></li>
            <li><a href="{{route('sliderindex')}}">Slider</a></li>
            <li><a href="{{route('aboutIndex')}}">About</a></li>
        </ul>
    </li>
    @endif
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cash-multiple"></i> <span> Transaction </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{ route('ordertransactionIndex') }}">Order Transaction</a></li>
            <li><a href="{{route('indexReturn')}}">Return Transaction</a></li>
        </ul>
    </li>
    @if (Auth::user()->kode_jabatan == 'admin')
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-line"></i> <span> Report  </span> </a>
        <ul class="list-unstyled">
            <li><a href="{{route('laporanbarangIndex')}}">Laporan Barang</a></li>
            <li><a href="{{route('reporttransaction')}}">Laporan Transaksi</a></li>
        </ul>
    </li>
    @endif
    @if (Auth::user()->kode_jabatan == 'admin')
    <li>
       <a href="chats" class="waves-effect btn_chatting">
           <i class="ion-chatbubbles"></i>
           <span> Chatting </span>
       </a>
   </li>
   @endif
    <li>
        <a href="{{route('ContactBack.index')}}" class="waves-effect">
          <i class="ion-android-mail"></i>
            <span> Contact Message </span>
        </a>
    </li>
    <li>
        <a href="{{route('settingIndex')}}" class="waves-effect">
            <i class="ion-settings"></i>
            <span> Setting </span>
        </a>
    </li>
</ul>
