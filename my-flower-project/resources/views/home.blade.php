@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
@include('layouts.carouse')

<!-- flower card section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-4 text-center">Featured Bouquets</h2>
    <div class="row g-4">

      <!-- Flower Card 1 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="overflow-hidden">
            <img src="https://i.pinimg.com/1200x/08/81/68/088168e02ea955049c37ef1ae5c12f21.jpg" class="flower-img" alt="Red Roses Bouquet">
          </div>
          <div class="card-body">
            <h5 class="card-title">Red Roses</h5>
            <p class="card-text">A classic bouquet of premium red roses — perfect for romantic gestures.</p>
            <p class="fw-bold">$29.99</p>
            <a href="#" class="btn btn-primary w-100">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- Flower Card 2 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="overflow-hidden">
            <img src="https://i.pinimg.com/1200x/63/30/84/63308407d88be3e9ec588dbf246448df.jpg" class="flower-img" alt="Colorful Tulips">
          </div>
          <div class="card-body">
            <h5 class="card-title">Spring Tulips</h5>
            <p class="card-text">Bright and colorful tulips, hand-tied with love. Great for any celebration.</p>
            <p class="fw-bold">$24.99</p>
            <a href="#" class="btn btn-primary w-100">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- Flower Card 3 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="overflow-hidden">
            <img src="https://i.pinimg.com/736x/04/83/d5/0483d5f4ff1907c443e5341ff796e3fd.jpg" class="flower-img" alt="Sunflower Mix">
          </div>
          <div class="card-body">
            <h5 class="card-title">Sunshine Bouquet</h5>
            <p class="card-text">A radiant mix of sunflowers and seasonal blooms to brighten any room.</p>
            <p class="fw-bold">$34.99</p>
            <a href="#" class="btn btn-primary w-100">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- Flower Card 4 -->
<div class="col-md-4">
  <div class="card h-100 shadow-sm border-0">
    <div class="overflow-hidden">
      <img src="https://i.pinimg.com/736x/10/3f/ab/103fabe5406417941174197d6fb02712.jpg" class="flower-img" alt="Lavender Bouquet">
    </div>
    <div class="card-body">
      <h5 class="card-title">Lavender Bliss</h5>
      <p class="card-text">Fragrant lavender stems wrapped in rustic brown paper, perfect for relaxation.</p>
      <p class="fw-bold">$27.50</p>
      <a href="#" class="btn btn-primary w-100">Add to Cart</a>
    </div>
  </div>
</div>

<!-- Flower Card 5 -->
<div class="col-md-4">
  <div class="card h-100 shadow-sm border-0">
    <div class="overflow-hidden">
      <img src="https://i.pinimg.com/1200x/f4/16/66/f416665abe7163ee3220a26f3667804a.jpg" class="flower-img" alt="Orchid Bouquet">
    </div>
    <div class="card-body">
      <h5 class="card-title">Elegant Orchids</h5>
      <p class="card-text">A sophisticated bouquet of white orchids, symbolizing beauty and strength.</p>
      <p class="fw-bold">$45.00</p>
      <a href="#" class="btn btn-primary w-100">Add to Cart</a>
    </div>
  </div>
</div>

<!-- Flower Card 6 -->
<div class="col-md-4">
  <div class="card h-100 shadow-sm border-0">
    <div class="overflow-hidden">
      <img src="https://i.pinimg.com/1200x/55/81/09/558109b542b2915a2da3f3bc73dcc0a4.jpg" class="flower-img" alt="Peony Bouquet">
    </div>
    <div class="card-body">
      <h5 class="card-title">Pink Peonies</h5>
      <p class="card-text">Soft pink peonies that bring charm and elegance to any occasion.</p>
      <p class="fw-bold">$38.75</p>
      <a href="#" class="btn btn-primary w-100">Add to Cart</a>
    </div>
  </div>
</div>


    </div>
  </div>
</section>

<!-- another section -->

<section class="py-5 bg-white">
  <div class="container">
    <div class="row text-center gy-4">

      <div class="col-md-3">
        <i class="bi bi-clock-history fs-1 text-primary mb-2"></i>
        <h5 class="fw-bold">Order before 9pm</h5>
        <p>for delivery tomorrow. Fast delivery 6 days a week!</p>
      </div>

      <div class="col-md-3">
        <i class="bi bi-gift fs-1 text-primary mb-2"></i>
        <h5 class="fw-bold">Extra value!</h5>
        <p>Up to 50% off &amp; free chocolates</p>
      </div>

      <div class="col-md-3">
        <i class="bi bi-flower1 fs-1 text-primary mb-2"></i>
        <h5 class="fw-bold">7 day freshness</h5>
        <p>Giving you peace of mind and fresh flowers</p>
      </div>

      <div class="col-md-3">
        <i class="bi bi-star-fill fs-1 text-primary mb-2"></i>
        <h5 class="fw-bold">4.1 out of 5</h5>
        <p>Over 44,000 ratings on Google reviews</p>
      </div>

    </div>
  </div>
</section>


<!-- another section -->

<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Text Column -->
      <div class="col-md-6">
        <h2 class="mb-4 text-center">Why Choose Blossom Boutique?</h2>
        <div class="">
          <h5 class="fw-bold text-center">Gift Bundles</h5>
          <p class="text-center Roboto">Looking to make a lasting impression? Surprise someone with a beautifully curated gift bundle, perfect for any special occasion. Whether it's a milestone birthday, a meaningful anniversary, or simply a gesture to brighten their day, our handpicked selection offers something for everyone. Explore our collection at Eflorist and send a gift that truly shows you care.</p>
        </div>
      </div>

      <!-- Image Column -->
      <div class="col-md-6">
        <div style="
          background-image: url('https://i.pinimg.com/736x/ff/5e/91/ff5e919fd944a3122dde08f73437106c.jpg');
          background-size: cover;
          background-position: center;
          height: 400px;
          border-radius: 8px;
        "></div>
      </div>
    </div>
  </div>
</section>

@endsection
