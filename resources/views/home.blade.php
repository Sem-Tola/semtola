@extends('layouts.app')


@section('content')
    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <h2>Welcome to</h2><h1 class="fw-bold text-success">TEEN.</h1>
            <p>We are a family-run Japanese tea company founded in 1717, in the heart of 
                <br>Kyoto. For generations, we have upheld a tradition of aromatic, well-balanced 
                <br>teas by carefully selecting, blending, and crafting each of our 30+ blends.</p>
        </div>
    </section>

    <!-- Featured Products -->
@php
    

    $products = [
        ['name' => 'Matcha Teen (White)', 'price' => 14.8, 'image' => 'IMG_2991.PNG'],
        ['name' => 'Matcha Teen (Green)', 'price' => 14.8, 'image' => 'IMG_3000.jpg'],
        ['name' => 'UMI', 'price' => 38, 'image' => 'IMG_3007.PNG'],
        ['name' => 'Sadō', 'price' => 27, 'image' => 'IMG_3012.PNG'],
        ['name' => 'Ummon', 'price' => 43, 'image' => 'IMG_3014.jpg'],
        ['name' => 'Mellow', 'price' => 29, 'image' => 'IMG_3017.jpg'],
        ['name' => 'Uji', 'price' => 38, 'image' => 'IMG_3016.jpg'],
        ['name' => 'Chymey', 'price' => 32, 'image' => 'IMG_3018.jpg'],
        ['name' => 'Marukyu koyamaen ISUZU matcha', 'price' => 41, 'image' => 'IMG_3019.jpg'],
        ['name' => 'Yugen (Marukyu Koyamaen)', 'price' => 37, 'image' => 'IMG_3020.jpg'],
        ['name' => 'Kanbayashi Shunsho', 'price' => 45.36, 'image' => 'IMG_3021.jpg'],
        ['name' => 'Tsubokiri matcha', 'price' => 39, 'image' => 'IMG_3023.jpg'],
    ];
@endphp
<div class="product-search">
  <input type="text" id="searchInput" placeholder="Search products..." />
</div>

<section class="products">
    <div class="container">
        <h3>🔥 Featured Products</h3>
        <div class="product-grid">
            @foreach ($products as $index => $product)
                <div class="product-card">
                    <img class="imagesize" src="{{ asset('images/product/' . $product['image']) }}" alt="{{ $product['name'] }}">
                    <h6 class="product-title"> {{ $product['name'] }}</h6>   
                    <p>$ {{ $product['price'] }}</p>
                    <a href="/product/{{ $index + 1 }}" class="btn-view">View</a>
                    <a href="/product/{{ $index + 1 }}" class="btn-add">Add</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
  const searchInput = document.getElementById("searchInput");

  searchInput.addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    const productCards = document.querySelectorAll(".product-card");

    productCards.forEach(card => {
      const title = card.querySelector(".product-title").textContent.toLowerCase();
      card.style.display = title.includes(searchValue) ? "block" : "none";
    });
  });
</script>


@endsection
