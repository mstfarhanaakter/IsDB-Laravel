        <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header d-flex align-items-center p-2 bg-light">
  <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
    <!-- Logo image -->
    <img src="../assets/images/investment.png" class="img-fluid me-2" style="height:40px;" alt="FinTrack Logo">
    <!-- Brand name -->
    <span class="h4 mb-0 text-primary fw-bold">TailorBase</span>
  </a>
</div>
        
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('home') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- Master data section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-database"></i></span>
        <span class="pc-mtext">Employee Management</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">All Employee</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Add Employee</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Departments</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Attendence</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Salary Management</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Leave Request</a></li>
    </ul>
</li>
                <!-- Inventory  & Purchase -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-shopping-cart"></i></span>
        <span class="pc-mtext">Inventory Management</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="categories">All Materials</li>
        <li class="pc-item"><a class="pc-link" href="#!">Add New Materials</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Suppliers</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Purchase List</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Stock Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Low Stock Report</a></li>
    </ul>
</li

                <!--Production -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="fa-solid fa-industry"></i></i></span>
        <span class="pc-mtext">Production</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Bill of Materials (BOM)</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Production Orders</a></li>
        <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">Sections<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Cutting Section</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Sewing Section</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Finishing Section</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Packing Section</a></li>
            </ul>
        </li>
    </ul>
</li>

                <!-- Sales and shipment section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-truck"></i></span>
        <span class="pc-mtext">Sales & Shipment</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Sales Orders</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Invoices</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Shipments</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Delivery Reports</a></li>
    </ul>
</li>


                <!-- Reports Section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-file-text"></i></span>
        <span class="pc-mtext">Reports & Analytics</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Stock Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Production Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">QC Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Purchase Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Sales Report</a></li>
    </ul>
</li>

                <!-- my work -->



                <li class="pc-item">
                    <a href="../pages/login.html" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-lock"></i></span>
                        <span class="pc-mtext">Login</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="../pages/register.html" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                        <span class="pc-mtext">Register</span>
                    </a>
                </li>
                <!-- my work -->

            </ul>

        </div>
        </div>
</nav>