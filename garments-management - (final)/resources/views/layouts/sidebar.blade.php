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
          <!-- Order Management -->
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-truck-delivery"></i></span>
        <span class="pc-mtext">Order Management</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="{{ route('buyers.index') }}">Buyer List</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ route('orders.index') }}">All Orders</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ route('orders.create') }}">Add New Order</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ route('buyers.orders') }}">Order Status</a></li>
        
        <li class="pc-item"><a class="pc-link" href="#!">Delivery</a></li>
      </ul>
    </li>

    <!-- Production Management -->
    <!-- <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-building-store"></i></span>
        <span class="pc-mtext">Production</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Cutting Section</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Sewing Section</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Finishing Section</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Production Report</a></li>
      </ul>
    </li> -->

    <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-building-factory"></i></span><span class="pc-mtext">Production Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('productions.index') }}">Production Lines</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('productions.create') }}">New Production Entry</a></li>
            <li class="pc-item"><a class="pc-link" href="">Work Progress</a></li>
            <li class="pc-item"><a class="pc-link" href="">Defect Report</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Completed Production</a></li>
          </ul>
        </li>


        <!-- Supplier Management -->
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-truck"></i></span>
        <span class="pc-mtext">Supplier Management</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="{{ route('suppliers.index') }}">All Suppliers</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ route('materials.index') }}">Add Product</a></li>
        <li class="pc-item"><a class="pc-link" href=" {{ route('purchases.index') }}">Purchase List</a></li>
       
        <li class="pc-item"><a class="pc-link" href="">Purchase Orders</a></li>
      </ul>
    </li>

    <!-- Inventory / Stock Management -->
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-box"></i></span>
        <span class="pc-mtext">Inventory Management</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Raw Materials</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Finished Goods</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Material Issue</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Stock Report</a></li>
      </ul>
    </li>

    <!-- Employee / HR Management -->
    <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-users"></i></span><span class="pc-mtext">Employee Management</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('departments.index') }}">Departments</a></li>
            <li class="pc-item"><a class="pc-link" href="">Manage Employees</a></li> 
            <li class="pc-item"><a class="pc-link" href="">Attenence</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Salary Management</a></li>
            <li class="pc-item"><a class="pc-link" href="#!">Leave Request</a></li>
          </ul>
        </li>

    

    <!-- Buyer Management -->
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-triangle-square-circle"></i></span>
        <span class="pc-mtext">Buyer Management</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">All Buyers</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Add Buyer</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Buyer Orders</a></li>
      </ul>
    </li>

    <!-- Quality Control -->
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-circle-check"></i></span>
        <span class="pc-mtext">Quality Control</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Inspection</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Defect Report</a></li>
      </ul>
    </li>

    <!-- Reports -->
    <li class="pc-item pc-hasmenu">
      <a href="#!" class="pc-link">
        <span class="pc-micon"><i class="ti ti-report"></i></span>
        <span class="pc-mtext">Reports</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
      </a>
      <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="#!">Sales Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Production Report</a></li>
        <li class="pc-item"><a class="pc-link" href="#!">Employee Report</a></li>
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