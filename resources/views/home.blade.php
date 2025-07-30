@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <h2>Welcome to TEEN.</h2>
            <p>Your trusted online store for both businesses and individuals.</p>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="products">
        <div class="container">
            <h3>🔥 Featured Products</h3>
            <div class="product-grid">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="product-card">
                        <img class="imagesize" src="{{ asset('images/R.jpg') }}" alt="Product {{ $i }}">
                        <h4>Product {{ $i }}</h4>
                        <p>$ {{ 10 * $i }}</p>
                        <a href="/product/{{ $i }}" class="btn-sm">View</a>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
