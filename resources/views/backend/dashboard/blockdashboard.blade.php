 <div class="row">
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-primary">
            <span class="mini-stat-icon"><i class="mdi mdi-check-all"></i></span>
            <div class="mini-stat-info text-right text-white">
                <span class="counter">{{ $transactionSuccess }}</span>
                Transaction success
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-primary">
            <span class="mini-stat-icon"><i class="mdi mdi-backup-restore"></i></span>
            <div class="mini-stat-info text-right text-white">
                <span class="counter">{{ $transactionReturSuccess }}</span>
                <br> return success
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-primary">
            <span class="mini-stat-icon"><i class="mdi mdi-account"></i></span>
            <div class="mini-stat-info text-right text-white">
                <span class="counter">{{ $userMember }}</span>
                <br> Users Active
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="mini-stat clearfix bg-primary">
            <span class="mini-stat-icon"><i class="mdi mdi-tshirt-crew"></i></span>
            <div class="mini-stat-info text-right text-white">
                <span class="counter">@if($countProduct) $countProduct @else 0 @endif</span>
                <br> Stock All Product
            </div>
        </div>
    </div>
</div>