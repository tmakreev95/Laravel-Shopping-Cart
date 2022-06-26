@extends('layouts.master')

@section('title')
PC Store - 2018
@endsection

@section('content')
  @if (session()->has('success'))
    <div class="row">
      <div class="col-sm-6 col-md-offset-4 col-sm-offset-3">
        <div class="alert alert-success" id="charge-message">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
  @endif
  @foreach($products->chunk(3) as $productChunk)
  <div class="row">
    @foreach ($productChunk as $product)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="{{ $product->imagePath }}">
        <div class="caption">
          <h3>{{ $product->title }}</h3>
          <p class="product-description">{{ $product->description }}</p>
          <div class="clearfix">
            <span class="product-price-tag pull-left">${{ $product->price }}</span>
            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to cart</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
@endsection
