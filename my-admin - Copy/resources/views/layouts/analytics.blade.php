<!-- ==================== Garments Management Dashboard ==================== -->
<div class="row">
  <!-- Total Orders -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Orders</h6>
        <h4 class="mb-3">1,245 
          <span class="badge bg-light-success border border-success">
            <i class="ti ti-trending-up"></i> 10.8%
          </span>
        </h4>
        <p class="mb-0 text-muted">Increased by <span class="text-success">120 orders</span> this month</p>
      </div>
    </div>
  </div>

  <!-- Total Production -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Production</h6>
        <h4 class="mb-3">980 Units 
          <span class="badge bg-light-primary border border-primary">
            <i class="ti ti-trending-up"></i> 5.6%
          </span>
        </h4>
        <p class="mb-0 text-muted">Produced <span class="text-primary">52 units</span> more this month</p>
      </div>
    </div>
  </div>

  <!-- Total Expenses -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Total Expenses</h6>
        <h4 class="mb-3">$24,350 
          <span class="badge bg-light-danger border border-danger">
            <i class="ti ti-trending-down"></i> 7.4%
          </span>
        </h4>
        <p class="mb-0 text-muted">Spent <span class="text-danger">$1,500</span> more than last month</p>
      </div>
    </div>
  </div>

  <!-- Profit -->
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <h6 class="mb-2 f-w-400 text-muted">Net Profit</h6>
        <h4 class="mb-3">$18,920 
          <span class="badge bg-light-success border border-success">
            <i class="ti ti-trending-up"></i> 14.2%
          </span>
        </h4>
        <p class="mb-0 text-muted">Profit growth <span class="text-success">+2.4%</span> this quarter</p>
      </div>
    </div>
  </div>
</div>

<!-- ==================== Charts & Reports ==================== -->
<div class="container mt-3">
  <div class="row">
    <!-- Production vs Expense Chart -->
    <div class="col-md-12 col-xl-8">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="mb-0">Production vs Expenses</h5>
        <ul class="nav nav-pills justify-content-end mb-0">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="pill">Month</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill">Week</button>
          </li>
        </ul>
      </div>

      <div class="card">
        <div class="card-body">
          <div id="production-expense-chart" style="height: 250px;"></div>
        </div>
      </div>
    </div>

    <!-- Production Overview -->
    <div class="col-md-12 col-xl-4">
      <h5 class="mt-4">Production Overview</h5>
      <div class="card">
        <div class="card-body">
          <h6 class="mb-2 f-w-400 text-muted">This Month</h6>
          <h3 class="mb-3">980 Units</h3>
          <div id="production-overview-chart" style="height: 200px;"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ==================== Recent Orders ==================== -->
  <div class="row mt-4">
    <div class="col-md-12 col-xl-8">
      <h5 class="mb-3">Recent Orders</h5>
      <div class="card tbl-card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Client</th>
                  <th>Product</th>
                  <th>Status</th>
                  <th class="text-end">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#ORD-001</td>
                  <td>H&M</td>
                  <td>T-Shirts</td>
                  <td><span class="text-success">Completed</span></td>
                  <td class="text-end">$8,500</td>
                </tr>
                <tr>
                  <td>#ORD-002</td>
                  <td>Zara</td>
                  <td>Jackets</td>
                  <td><span class="text-warning">In Progress</span></td>
                  <td class="text-end">$5,200</td>
                </tr>
                <tr>
                  <td>#ORD-003</td>
                  <td>Levis</td>
                  <td>Jeans</td>
                  <td><span class="text-danger">Delayed</span></td>
                  <td class="text-end">$3,700</td>
                </tr>
                <tr>
                  <td>#ORD-004</td>
                  <td>Gap</td>
                  <td>Shirts</td>
                  <td><span class="text-success">Completed</span></td>
                  <td class="text-end">$4,950</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Analytics Summary -->
    <div class="col-md-12 col-xl-4">
      <h5 class="mb-3">Analytics Summary</h5>
      <div class="card">
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
            Production Efficiency <span class="h6 mb-0">+12.4%</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
            Cost per Unit <span class="h6 mb-0">$24.6</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
            Delivery Accuracy <span class="h6 mb-0">96%</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
