@component('mail::message')


# Purchase Orders

Hello {{$userName}},Your purchase has been paid!

<hr>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>Code Transaction</td>
		<td>Order On</td>
	</tr>
	<tr>
		<td> <h1> {{ $detailTransaction->kode_pemesanan }} </h1> </td>
		<td> {{ $detailTransaction->created_at }} </td>
	</tr>
</table>
<hr>
<h3 style="text-align: center;">Item Purchase</h3>

@component('mail::table')
| Product       | Price    | Qty      | Subtotal |
| :-----------: | --------:| --------:| --------:|
@php $subtotal = 0; @endphp
@foreach($detailTransaction->opsiDetailHistory as $item)
| {{ $item->detailProduct->nama_barang }}      | $ {{ $item->harga }}		| {{ $item->qty }}      | $ {{ $item->subtotal }}      |
@php
	$subtotal += $item->subtotal;
@endphp
@endforeach
|               | 			| Subtotal    | $ {{ $subtotal }}      |
|               | 			| Cost Shipping | $ {{ $detailTransaction->grandtotal - $detailTransaction->diskon - $subtotal }}      |
|               | 			| Discount | {{ (!is_null($detailTransaction->diskon))?"$ ".$detailTransaction->diskon:"-" }}      |
|               | 			| Grandtotal | $ {{ $detailTransaction->grandtotal - $detailTransaction->diskon }}      |
@endcomponent

@component('mail::button', ['url' => route('detailHistoryTransaction',['codeTransaction'=>encrypt($detailTransaction->kode_pemesanan)])])
View Purchase
@endcomponent

Thanks,<br>
{{$appname}}
@endcomponent