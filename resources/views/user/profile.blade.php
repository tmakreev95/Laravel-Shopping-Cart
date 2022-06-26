@extends('layouts.master')

@section('content')
<h1 class="greetings">Hello, {{ Auth::user()->name }} - This is your profile and orders list</h1>
<div class="row">
  <div class="col-md-8 col-md-offset-2">

    @foreach ($orders as $order)
      <div class="panel panel-default">
        <div class="panel-body">
          <ul class="list-group">
            @foreach ($order->cart->items as $item)
              <li class="list-group-item">
                <div class="shopping-cart-image-holder pull-left">
                  <img src="{{ $item['item']['imagePath'] }}" alt="">
                </div>
                <i class="fa fa-money pull-left orders-icon"></i><span class="badge orders-span pull-left">Price: $ {{ $item['price'] }} | </span>
                <i class="fa fa-pencil pull-left orders-icon"></i><span class="badge  orders-span pull-left">Item's Title: {{ $item['item']['title'] }}</span>
                <span class="badge orders-span pull-right">Quantity: {{ $item['qty'] }}</span>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="panel-footer pull-right">
          <strong>Total price of the purchase: <span class="badge"> ${{ $order->cart->totalPrice }}</span></strong>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr>
    @endforeach
  </div>
</div>
@endsection
