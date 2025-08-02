@extends('layouts.app')

@section('content')
@section('content')
    <!-- Hero -->
    <section class="hero">
        <h1 class="fw-bold text-success">Catalog</h1>
        <p class="text-muted fs-5">Find your products here.</p>
    </section>

    <!-- Featured Products -->
@php
    

    $products = [
        ['id' => 1,'name' => 'Matcha Teen (White)', 'price' => 14.8, 'image' => 'IMG_2991.PNG'],
        ['id' => 2,'name' => 'Matcha Teen (Green)', 'price' => 14.8, 'image' => 'IMG_3000.jpg'],
        ['id' => 3,'name' => 'UMI', 'price' => 38, 'image' => 'IMG_3007.PNG'],
        ['id' => 4,'name' => 'Sadō', 'price' => 27, 'image' => 'IMG_3012.PNG'],
        ['id' => 5,'name' => 'Ummon', 'price' => 43, 'image' => 'IMG_3014.jpg'],
        ['id' => 6,'name' => 'Mellow', 'price' => 29, 'image' => 'IMG_3017.jpg'],
        ['id' => 7,'name' => 'Uji', 'price' => 38, 'image' => 'IMG_3016.jpg'],
        ['id' => 8,'name' => 'Chymey', 'price' => 32, 'image' => 'IMG_3018.jpg'],
        ['id' => 9,'name' => 'Marukyu koyamaen ISUZU matcha', 'price' => 41, 'image' => 'IMG_3019.jpg'],
        ['id' => 10,'name' => 'Yugen (Marukyu Koyamaen)', 'price' => 37, 'image' => 'IMG_3020.jpg'],
        ['id' => 11,'name' => 'Kanbayashi Shunsho', 'price' => 45.36, 'image' => 'IMG_3021.jpg'],
        ['id' => 12,'name' => 'Tsubokiri matcha', 'price' => 39, 'image' => 'IMG_3023.jpg'],
    ];
@endphp
<div class="product-search">
  <input type="text" id="searchInput" placeholder="Search products..." />
</div>

<section class="products">
    <div class="container">
        {{-- <h1 class = "catalog-title">Catalog</h1> --}}
        <div class="product-grid">
            @foreach ($products as $index => $product)
                <div class="product-card">
                    <img class="imagesize" src="{{ asset('images/product/' . $product['image']) }}" alt="{{ $product['name'] }}">
                    <h6 class="product-title"> {{ $product['name'] }}</h6>   
                    <p>$ {{ $product['price'] }}</p>
                    <form action="{{ route('cart.add', ['id' => $product['id']]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $index }}">
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
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
