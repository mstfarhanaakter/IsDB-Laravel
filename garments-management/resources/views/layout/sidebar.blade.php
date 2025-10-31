<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ========= -->
        <!-- <img src="../assets/images/logo-white.svg" class="img-fluid logo-lg" alt="logo"> -->
        <img src={{asset('assets/images/threadline-logo-black.svg')}} class="img-fluid me-2" style="height:40px;" alt="thread logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="/" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>
          <!-- employee section -->
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-users"></i></span><span class="pc-mtext">Employee Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('employees.index') }}">Manage Employees</a></li> 
            <li class="pc-item"><a class="pc-link" href="{{ route('departments.index') }}">Departments</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Attenence</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Salary Management</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Leave Request</a></li>
          </ul>
        </li>

        <!-- ==== inventory section -->

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-building-store"></i></span><span class="pc-mtext">Inventory Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">All Materials</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('materials.index') }}">Add New Materials</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('suppliers.index') }}">Suppliers</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('purchases.index') }}">Purchase List</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('stocktransactions.index') }}">Stock Report</a></li>
            <!-- <li class="pc-item"><a class="pc-link" href="#!">Low Stock Report</a></li> -->
          </ul>
        </li>

        <!-- production Management -->

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-building-factory"></i></span><span class="pc-mtext">Production Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('productions.index') }}">Production Lines</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">New Production Entry</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Work Progress</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Defect Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Completed Production</a></li>
          </ul>
        </li>

        <!-- Order section -->
         <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-truck-delivery"></i></span><span class="pc-mtext">Order Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">All Orders</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Add New Orders</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Buyer List</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Order Tracking</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Delivery</a></li>
          </ul>
        </li>

        <!-- finace section  -->

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-currency-dollar"></i></span><span class="pc-mtext">Finance</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Income</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Expenses</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Salary Payments</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Supplier Payments</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Financial Report</a></li>
        
          </ul>
        </li>

        <!-- reports -->

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-report-money"></i></span><span class="pc-mtext">Reports</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Employee Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Production Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Order Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Stock Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Attendence Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Profit & Loss Summary</a></li>
          </ul>
        </li>

        <!-- setting section -->

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-settings-automation"></i></span><span class="pc-mtext">Setting</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Company Profile</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">User Role & Permission</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Backup & Restore</a></li>
            
          </ul>
        </li>
         
       

       
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
      </ul>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->