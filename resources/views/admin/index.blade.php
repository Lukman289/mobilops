@extends('admin.layout.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Summary Cards -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h5 class="card-title">1200</h5>
                    <p class="card-text">Total registered users in the system.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-header">Active Orders</div>
                <div class="card-body">
                    <h5 class="card-title">450</h5>
                    <p class="card-text">Orders currently being processed.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-header">Pending Requests</div>
                <div class="card-body">
                    <h5 class="card-title">32</h5>
                    <p class="card-text">Requests waiting for approval or action.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Graph -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sales Analytics</div>
                <div class="card-body">
                    <div id="chart-container" style="height: 300px; width: 100%;">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Quick Stats</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle me-2"></i> 45% increase in traffic</li>
                        <li><i class="bi bi-check-circle me-2"></i> 25 new orders this month</li>
                        <li><i class="bi bi-check-circle me-2"></i> 13% growth in revenue</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Activity</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Activity</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>New user registered</td>
                                <td>2024-12-17</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Order #1123 shipped</td>
                                <td>2024-12-16</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>User profile updated</td>
                                <td>2024-12-15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection