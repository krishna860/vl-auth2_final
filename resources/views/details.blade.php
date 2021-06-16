@extends('layouts.app')

@section('content')


<div class="container">
<div class="table-responsive">
<table class="table">
<center><h2 style="margin-top:50px;margin-bottom:40px;">Product Detail</h2></center>
<thead>
<tr>
<td class="w-15">ProductName:</td>
<td class="w-15">ProductQuality:</td>
<td class="w-15">ProductQuantity:</td>
<td class="w-15">ProductPrice:</td>
</tr>
</thead>
<tbody>
@foreach($details as $detail)

<tr>
    <td class="w-15">{{$detail->Name}}</td>
    <td class="w-15">{{$detail->Quality}}</td>
    <td class="w-15">{{$detail->Quantity}}</td>
    <td class="w-15">{{$detail->Price}}</td>
</tr>

@endforeach
</table>

</div>
<center><a href="/productList">backkk</a></center>

</div>

    <viewdetails-component></viewdetails-component>
@endsection

