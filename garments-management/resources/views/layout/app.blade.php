@include('layout.header')
@include('layout.sidebar')
@include('layout.topbar')

<main>
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                @yield('content')
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .pc-content -->
    </div> <!-- .pc-container -->
</main>

@include('layout.footer')
