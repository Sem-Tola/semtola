@extends('layouts.app')

@section('content')
<section class="product-detail">
    <div class="container">
        <div class="product-wrapper">
            <div class="product-image">
                <img src="{{ asset('images/products/' . $product['image']) }}" alt="{{ $product['name'] }}">
            </div>
            <div class="product-info">
                <h2>{{ $product['name'] }}</h2>
                <p class="price">$ {{ number_format($product['price']) }}</p>
                <p class="desc">{{ $product['description'] }}</p>

                <form method="POST" action="/cart/add">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="btn-buy">🛒 Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
