@extends("layouts.app")
@section('title', 'About Us')
@section('content')

   <!-- Hero Section -->
  <section class="hero text-center text-white" style="
  background: url('https://i.pinimg.com/1200x/72/e5/a0/72e5a0e36e46567af9238632520060a3.jpg') no-repeat center center;
  background-size: cover;
  padding: 100px 0;
">
  <div class="container">
    <h1 class="display-4">About Blossom Boutique</h1>
    <p class="lead">Bringing joy, one bouquet at a time</p>
  </div>
</section>


  <!-- About Us Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4">Our Story</h2>
      <p>
        Founded in 2010, <strong>Blossom Boutique</strong> began as a small, family-run flower shop in the heart of the city. What started with a love for fresh blooms and creativity has blossomed into one of the most beloved floral destinations in town. We specialize in crafting stunning floral arrangements for every occasion — from weddings and birthdays to everyday celebrations.
      </p>
      <p>
        Our flowers are sourced fresh daily, and each arrangement is thoughtfully designed by our passionate florists. Whether you walk into our store or order online, we’re here to help you express love, gratitude, sympathy, and joy through flowers.
      </p>
    </div>
  </section>

  <!-- Mission & Values -->
  <section class="bg-light py-5">
    <div class="container">
      <h2 class="mb-4">Our Mission & Values</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <h5>🌼 Passion for Flowers</h5>
          <p>We live and breathe florals. Every stem is selected with care, and every bouquet tells a story.</p>
        </div>
        <div class="col-md-4">
          <h5>🌿 Sustainability</h5>
          <p>We work with local growers whenever possible and reduce waste through eco-friendly practices.</p>
        </div>
        <div class="col-md-4">
          <h5>💖 Customer Love</h5>
          <p>We’re dedicated to delivering not just flowers, but unforgettable moments and emotions.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Meet the Team -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4">Meet Our Team</h2>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <img src="https://i.pinimg.com/736x/22/bd/56/22bd566c4bbe272956db066ca7522d8e.jpg" alt="Founder" class="rounded-circle mb-3" width="150" height="150">
          <h5>Emma Rose</h5>
          <p class="text-muted">Founder & Head Florist</p>
        </div>
        <div class="col-md-4 text-center">
          <img src="https://i.pinimg.com/736x/a9/97/29/a99729e4ad3ed8cabd041f2b8a9832bf.jpg" alt="Designer" class="rounded-circle mb-3" width="150" height="150">
          <h5>Liam Bloom</h5>
          <p class="text-muted">Floral Designer</p>
        </div>
        <div class="col-md-4 text-center">
          <img src="https://i.pinimg.com/736x/3b/74/5b/3b745bd3213e779f027f4aa57852c061.jpg" alt="Customer Service" class="rounded-circle mb-3" width="150" height="150">
          <h5>Sophia Green</h5>
          <p class="text-muted">Customer Experience Lead</p>
        </div>
      </div>
    </div>
  </section>

@endsection
