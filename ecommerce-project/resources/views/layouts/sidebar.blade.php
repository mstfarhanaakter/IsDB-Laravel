<!-- Sidebar Start -->
<div class="sidebar bg-light border-end vh-100">
    <nav class="navbar navbar-light flex-column align-items-start p-3">
        <!-- Brand -->
        <a href="index.html" class="navbar-brand d-flex align-items-center mb-4">
            <i class="fa fa-hashtag fa-lg text-primary me-2"></i>
            <span class="h4 mb-0 text-primary fw-bold">Admin</span>
        </a>

        <!-- User Profile -->
        <div class="d-flex align-items-center mb-4">
            <div class="position-relative">
                <img class="rounded-circle border border-2 border-white" src="img/user.jpg" alt="User" style="width: 50px; height: 50px;">
                <span class="bg-success rounded-circle border border-white position-absolute bottom-0 end-0 p-1"></span>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 fw-bold">Ashikuzzaman</h6>
                <small class="text-muted">Admin</small>
            </div>
        </div>

        <!-- Navigation -->
        <div class="nav flex-column w-100">
            <a href="index.html" class="nav-link active d-flex align-items-center mb-1 rounded">
                <i class="fa fa-tachometer-alt me-2"></i> Dashboard
            </a>

            <!-- Products -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center mb-1 rounded" data-bs-toggle="dropdown">
                    <i class="fa fa-boxes me-2"></i> Products
                </a>
                <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a href="products/create" class="dropdown-item">Add Product</a></li>
                    <li><a href="products" class="dropdown-item">All Products</a></li>
                    <li><a href="categories.html" class="dropdown-item">Categories</a></li>
                    <li><a href="brands.html" class="dropdown-item">Brands</a></li>
                </ul>
            </div>

            <!-- Orders -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center mb-1 rounded" data-bs-toggle="dropdown">
                    <i class="fa fa-shopping-bag me-2"></i> Orders
                </a>
                <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a href="orders.html" class="dropdown-item">All Orders</a></li>
                    <li><a href="pending-orders.html" class="dropdown-item">Pending Orders</a></li>
                    <li><a href="processing-orders.html" class="dropdown-item">Processing Orders</a></li>
                    <li><a href="completed-orders.html" class="dropdown-item">Completed Orders</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center mb-1 rounded" data-bs-toggle="dropdown">
                    <i class="fa fa-tags me-2"></i> Categories
                </a>
                <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a href="categories" class="dropdown-item">All Categories</a></li>
                </ul>
            </div>

            <!-- Customers -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center mb-1 rounded" data-bs-toggle="dropdown">
                    <i class="fa fa-users me-2"></i> Customers
                </a>
                <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a href="customers.html" class="dropdown-item">All Customers</a></li>
                    <li><a href="add-customer.html" class="dropdown-item">Add Customer</a></li>
                </ul>
            </div>

            <!-- Payments -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center mb-1 rounded" data-bs-toggle="dropdown">
                    <i class="fa fa-credit-card me-2"></i> Payments
                </a>
                <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a href="all-payments.html" class="dropdown-item">All Payments</a></li>
                    <li><a href="pending-payments.html" class="dropdown-item">Pending Payments</a></li>
                    <li><a href="failed-payments.html" class="dropdown-item">Failed Payments</a></li>
                </ul>
            </div>

            <!-- Reports -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center mb-1 rounded" data-bs-toggle="dropdown">
                    <i class="fa fa-chart-line me-2"></i> Reports
                </a>
                <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a href="sales-reports.html" class="dropdown-item">Sales Reports</a></li>
                    <li><a href="orders-reports.html" class="dropdown-item">Orders Reports</a></li>
                    <li><a href="payment-reports.html" class="dropdown-item">Income Reports</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
