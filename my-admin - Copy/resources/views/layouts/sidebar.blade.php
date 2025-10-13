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
        <span class="pc-micon"><i class="fa-solid fa-users"></i></i></span>
        <span class="pc-mtext">Employee</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="employees">All Employee</a></li>
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
        <span class="pc-mtext">Inventory</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <!-- <li class="pc-item"><a class="pc-link" href="categories">All Materials</a></li> -->
        <li class="pc-item"><a class="pc-link" href="categories">All Materials</a></li>
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
        <li class="pc-item"><a class="pc-link" href="#!">Production Lines</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">New Production Entry</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Work Progress</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Defect Reports</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Completed Production </a></li>
        <!-- <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">Sections<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Cutting Section</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Sewing Section</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Finishing Section</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Packing Section</a></li>
            </ul>
        </li> -->
    </ul>
</li>

                <!-- Sales and shipment section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-truck"></i></span>
        <span class="pc-mtext">Orders</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">All Orders</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Add New Order</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Buyer List</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Order Tracking</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Delivery</a></li>
    </ul>
</li>


     <!-- Account/Finance Section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="fa-solid fa-money-check-dollar"></i></span>
        <span class="pc-mtext">Finance</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Income</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Expenses</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Salary Payments</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Supplier Payments</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Financial Report</a></li>
    </ul>
</li>


                <!-- Reports Section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-file-text"></i></span>
        <span class="pc-mtext">Reports</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Employee Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Production Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Order Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Stock Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Attendence Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Profit & Loss Summary</a></li>
    </ul>
</li>
<!-- Setting Section -->
                <li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="fa-solid fa-gears"></i></span>
        <span class="pc-mtext">Setting</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Company Profile</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">User role & Permission</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Backup & Restore</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Language Setting</a></li>
        
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