@include('layouts.header')
@include('layouts.nav')

<main>
    @yield('content')  {{-- এখানে প্রতিটি পেজের আলাদা কনটেন্ট আসবে --}}
</main>

@include('layouts.footer')