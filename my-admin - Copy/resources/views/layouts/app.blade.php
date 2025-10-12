@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.topbar')

<main>
  <div class="pc-container">
    <div class="pc-content" id="main-content">
      @yield('content')
    </div>
  </div>
</main>

@include('layouts.footer')
