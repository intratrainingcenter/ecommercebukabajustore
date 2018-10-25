@if($trackingOrder)
<div class="flex-c-m flex-w w-full p-t-38">
      @if($trackingOrder->status != "cancel")
      <button style="width: 75px; height: 75px;" class="flex-c-m how-pagination1 trans-100 m-all-40 @if($trackingOrder->status != "pending") active-pagination1 @endif">
            Paid
      </button>
      @if($trackingOrder->status == "paid")
      <i class="zmdi zmdi-long-arrow-right animated infinite fadeInLeft zmdi-hc-lg"></i>
      @elseif($trackingOrder->status != "pending" && $trackingOrder->status != "paid")
      <i class="zmdi zmdi-check zmdi-hc-2x"></i>
      @endif
      <button style="width: 75px; height: 75px;" class="flex-c-m how-pagination1 trans-100 m-all-40 @if($trackingOrder->status != "pending" && $trackingOrder->status != "paid") active-pagination1 @endif">
            Process
      </button>
      @if($trackingOrder->status == "process")
      <i class="zmdi zmdi-rotate-right zmdi-hc-spin zmdi-hc-3x"></i>
      @elseif($trackingOrder->status == "delivery" || $trackingOrder->status == "received")
      <i class="zmdi zmdi-check zmdi-hc-2x"></i>
      @endif
      <button style="width: 75px; height: 75px;" class="flex-c-m how-pagination1 trans-100 m-all-40 @if($trackingOrder->status == "delivery" || $trackingOrder->status == "received") active-pagination1 @endif">
            Delivery
      </button>
      @if($trackingOrder->status == "delivery")
      <i class="zmdi zmdi-local-shipping animated infinite fadeInLeft zmdi-hc-2x"></i>
      @elseif($trackingOrder->status == "received")
      <i class="zmdi zmdi-check zmdi-hc-2x"></i>
      @endif
      <button style="width: 75px; height: 75px;" class="flex-c-m how-pagination1 trans-100 m-all-40 @if($trackingOrder->status == "received") active-pagination1 @endif">
            Received
      </button>
      @else

      <button style="width: 75px; height: 75px;" class="flex-c-m how-pagination1 trans-100 m-all-40">
            <i style="color: red;" class="zmdi zmdi-block zmdi-hc-2x"></i>
      </button>
      <div class="flex-c-m flex-w w-full p-t-20">
            <h4>Order has been Canceled, we will contact you via email or telephone number</h4>

      </div>
      @endif
</div>

<div class="flex-c-m flex-w w-full p-t-20">
      @if($trackingOrder->status == "paid")
      <h4>Order has been paid, will be processed soon </h4>@elseif($trackingOrder->status == "process")
      <h4>Order has been processed</h4>@elseif($trackingOrder->status == "delivery")
      <h4>Order has been shipped, wait patiently</h4>@elseif($trackingOrder->status == "received")
      <h4>Order has been received, thank you for ordering</h4>
      @endif

</div>
@else

<div class="flex-c-m flex-w w-full p-t-38" style="">
      <button style="width: 75px; height: 75px;" class="flex-c-m how-pagination1 trans-100 m-all-40">
            <i style="color: red;" class="zmdi zmdi-close animated infinite wobble zmdi-hc-2x"></i>
      </button>
</div>
<div class="flex-c-m flex-w w-full p-t-20">
      <h4>Transaction Not found, maybe the entered transaction code is incorrect</h4>
</div>
@endif