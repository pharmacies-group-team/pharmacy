@extends('layouts/dashboard/dashboard-mastre')
@section('content')

  <div class="container mt-4">
    <div class="row">
      <div class="col-sm-6">
        <div class="card widget-flat">
          <div class="card-body">
            <div class="float-end">
              <i class="mdi mdi-account-multiple widget-icon"></i>
            </div>
            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
            <h3 class="mt-3 mb-3">36,254</h3>
            <p class="text-muted mb-0">
              <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div> <!-- end card-body-->
        </div> <!-- end card-->
      </div> <!-- end col-->

      <div class="col-sm-6">
        <div class="card widget-flat">
          <div class="card-body">
            <div class="float-end">
              <i class="mdi mdi-cart-plus widget-icon"></i>
            </div>
            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Orders</h5>
            <h3 class="mt-3 mb-3">5,543</h3>
            <p class="text-muted mb-0">
              <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div> <!-- end card-body-->
        </div> <!-- end card-->
      </div> <!-- end col-->
    </div> <!-- end row -->

    <div class="row">
      <div class="col-sm-6">
        <div class="card widget-flat">
          <div class="card-body">
            <div class="float-end">
              <i class="mdi mdi-currency-usd widget-icon"></i>
            </div>
            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
            <h3 class="mt-3 mb-3">$6,254</h3>
            <p class="text-muted mb-0">
              <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div> <!-- end card-body-->
        </div> <!-- end card-->
      </div> <!-- end col-->

      <div class="col-sm-6">
        <div class="card widget-flat">
          <div class="card-body">
            <div class="float-end">
              <i class="mdi mdi-pulse widget-icon"></i>
            </div>
            <h5 class="text-muted fw-normal mt-0" title="Growth">Growth</h5>
            <h3 class="mt-3 mb-3">+ 30.56%</h3>
            <p class="text-muted mb-0">
              <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div> <!-- end card-body-->
        </div> <!-- end card-->
      </div> <!-- end col-->
    </div> <!-- end row -->

  </div>
@stop
