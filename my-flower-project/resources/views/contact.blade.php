@extends('layouts.app')
@section ("title", "Contact Us")
@section('content')

<!-- start section -->
 <!-- Include Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Contact Us Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Get in Touch</h2>
    <div class="row g-5 align-items-start">

      <!-- Contact Form -->
      <div class="col-md-6">
        <form id="contactForm" class="bg-white p-4 shadow rounded animate__animated animate__fadeInLeft">
          <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" required>
            <div class="invalid-feedback">Please enter your name.</div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" required>
            <div class="invalid-feedback">Please enter a subject.</div>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" id="message" rows="5" required></textarea>
            <div class="invalid-feedback">Please write your message.</div>
          </div>
          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-send-fill me-2"></i>Send Message
          </button>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="col-md-6 animate__animated animate__fadeInRight">
        <div class="bg-white p-4 shadow rounded h-100">
          <h5 class="fw-bold mb-4">Contact Information</h5>
          <ul class="list-unstyled">
            <li class="mb-3">
              <i class="bi bi-geo-alt-fill text-primary me-2"></i>
              123 Blossom Street, Flower City, FL 12345
            </li>
            <li class="mb-3">
              <i class="bi bi-telephone-fill text-primary me-2"></i>
              <a href="tel:+1234567890" class="text-decoration-none text-dark">+1 (234) 567-890</a>
            </li>
            <li class="mb-3">
              <i class="bi bi-envelope-fill text-primary me-2"></i>
              <a href="mailto:support@blossomboutique.com" class="text-decoration-none text-dark">support@blossomboutique.com</a>
            </li>
            <li>
              <i class="bi bi-clock-fill text-primary me-2"></i>
              Mon–Sat: 9am – 6pm<br>Sunday: Closed
            </li>
          </ul>
          <div class="mt-4">
            <iframe src="https://www.google.com/maps?q=New+York&output=embed" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- end section -->


@endsection

  



