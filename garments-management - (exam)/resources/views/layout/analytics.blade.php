@extends('layout.app')

@section('content')
<div class="container-fluid py-4" style="background: #f4f6fb; min-height: 100vh;">

  <!-- ================= Header ================= -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark mb-0">
      <i class="bi bi-clipboard-data text-primary me-2"></i>Dashboard
    </h3>
    <button class="btn btn-gradient btn-sm" style="background: linear-gradient(90deg, #6366f1, #4f46e5); color: #fff;" onclick="window.print()">
      <i class="bi bi-printer"></i> Print Report
    </button>
  </div>

  <!-- ================= KPI Cards ================= -->
  <div class="row g-4 mb-4">
    <!-- Orders -->
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #6EE7B7, #10B981);">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-white-50 mb-2">Total Orders</h6>
              <h3 class="fw-bold mb-0">{{ $totalOrders ?? 1245 }}</h3>
            </div>
            <div class="bg-white bg-opacity-25 rounded-circle p-3">
              <i class="bi bi-box-seam fs-3 text-white"></i>
            </div>
          </div>
          <p class="mb-0 mt-3 small text-white">↑ 120 new orders <span class="badge bg-light text-success">+10.8%</span></p>
        </div>
      </div>
    </div>

    <!-- Production -->
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #60A5FA, #3B82F6);">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-white-50 mb-2">Total Production</h6>
              <h3 class="fw-bold mb-0">{{ $totalProduction ?? 980 }} Units</h3>
            </div>
            <div class="bg-white bg-opacity-25 rounded-circle p-3">
              <i class="bi bi-gear-wide-connected fs-3 text-white"></i>
            </div>
          </div>
          <p class="mb-0 mt-3 small text-white">↑ 52 units <span class="badge bg-light text-primary">+5.6%</span></p>
        </div>
      </div>
    </div>

    <!-- Expenses -->
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #FB7185, #E11D48);">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-white-50 mb-2">Total Expenses</h6>
              <h3 class="fw-bold mb-0">${{ $expenses ?? '24,350' }}</h3>
            </div>
            <div class="bg-white bg-opacity-25 rounded-circle p-3">
              <i class="bi bi-cash-stack fs-3 text-white"></i>
            </div>
          </div>
          <p class="mb-0 mt-3 small text-white">↑ $1,500 more <span class="badge bg-light text-danger">-7.4%</span></p>
        </div>
      </div>
    </div>

    <!-- Profit -->
    <div class="col-md-6 col-xl-3">
      <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #FBBF24, #F59E0B);">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h6 class="text-white-50 mb-2">Net Profit</h6>
              <h3 class="fw-bold mb-0">${{ $profit ?? '18,920' }}</h3>
            </div>
            <div class="bg-white bg-opacity-25 rounded-circle p-3">
              <i class="bi bi-graph-up-arrow fs-3 text-white"></i>
            </div>
          </div>
          <p class="mb-0 mt-3 small text-white">↑ +2.4% growth</p>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= Charts ================= -->
  <div class="row g-4">
    <div class="col-xl-8 col-md-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h6 class="fw-semibold mb-0 text-dark"><i class="bi bi-bar-chart-line text-primary me-2"></i>Production vs Expenses</h6>
          <div class="btn-group btn-group-sm">
            <button class="btn btn-outline-primary active">Monthly</button>
            <button class="btn btn-outline-primary">Weekly</button>
          </div>
        </div>
        <div class="card-body">
          <div id="production-expense-chart" style="height: 280px;"></div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
          <h6 class="fw-semibold mb-0 text-dark"><i class="bi bi-pie-chart text-success me-2"></i>Production Overview</h6>
        </div>
        <div class="card-body text-center">
          <h3 class="fw-bold text-primary mb-3">{{ $monthlyProduction ?? 980 }} Units</h3>
          <div id="production-overview-chart" style="height: 230px;"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= Orders & Analytics ================= -->
  <div class="row g-4 mt-4">
    <!-- Recent Orders -->
    <div class="col-xl-8 col-md-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #3B82F6, #2563EB);">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-semibold">Recent Orders</h6>
            <a href="#" class="text-white small">View All</a>
          </div>
        </div>
        <div class="card-body">
          <table class="table align-middle mb-0">
            <thead class="table-light">
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
                <td><span class="badge bg-success">Completed</span></td>
                <td class="text-end">$8,500</td>
              </tr>
              <tr>
                <td>#ORD-002</td>
                <td>Zara</td>
                <td>Jackets</td>
                <td><span class="badge bg-warning text-dark">In Progress</span></td>
                <td class="text-end">$5,200</td>
              </tr>
              <tr>
                <td>#ORD-003</td>
                <td>Levi’s</td>
                <td>Jeans</td>
                <td><span class="badge bg-danger">Delayed</span></td>
                <td class="text-end">$3,700</td>
              </tr>
              <tr>
                <td>#ORD-004</td>
                <td>Gap</td>
                <td>Shirts</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td class="text-end">$4,950</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Analytics Summary -->
    <div class="col-xl-4 col-md-12">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
          <h6 class="fw-semibold mb-0 text-dark"><i class="bi bi-activity text-info me-2"></i>Analytics Summary</h6>
        </div>
        <div class="list-group list-group-flush">
          <div class="list-group-item d-flex justify-content-between">
            Production Efficiency <span class="fw-bold text-success">+12.4%</span>
          </div>
          <div class="list-group-item d-flex justify-content-between">
            Cost per Unit <span class="fw-bold text-primary">$24.6</span>
          </div>
          <div class="list-group-item d-flex justify-content-between">
            Delivery Accuracy <span class="fw-bold text-success">96%</span>
          </div>
          <div class="list-group-item d-flex justify-content-between">
            Defect Rate <span class="fw-bold text-danger">2.1%</span>
          </div>
          <div class="list-group-item d-flex justify-content-between">
            Worker Attendance <span class="fw-bold text-info">98%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Line Chart
  var options1 = {
    chart: { type: 'area', height: 280, toolbar: { show: false } },
    series: [
      { name: 'Production', data: [120, 180, 250, 300, 280, 400, 420] },
      { name: 'Expenses', data: [80, 130, 200, 240, 210, 300, 320] }
    ],
    xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'] },
    colors: ['#3B82F6', '#FB7185'],
    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.5, opacityTo: 0.1 } },
    stroke: { width: 3, curve: 'smooth' },
    legend: { position: 'top' }
  };
  new ApexCharts(document.querySelector("#production-expense-chart"), options1).render();

  // Donut Chart
  var options2 = {
    chart: { type: 'donut', height: 230 },
    labels: ['Completed', 'In Progress', 'Delayed'],
    series: [68, 22, 10],
    colors: ['#10B981', '#FBBF24', '#E11D48'],
    legend: { position: 'bottom' }
  };
  new ApexCharts(document.querySelector("#production-overview-chart"), options2).render();
</script>
@endsection
