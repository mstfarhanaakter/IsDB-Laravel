@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Defect Details</h1>
        <a href="{{ route('production_defects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th>Production Line:</th>
                    <td>{{ $productionDefect->productionLine->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Order No:</th>
                    <td>{{ $productionDefect->order->order_number ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Defect Type:</th>
                    <td>{{ $productionDefect->defect_type }}</td>
                </tr>
                <tr>
                    <th>Defect Qty:</th>
                    <td>{{ $productionDefect->defect_qty }}</td>
                </tr>
                <tr>
                    <th>Reported By:</th>
                    <td>{{ $productionDefect->reported_by ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $productionDefect->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        @if($productionDefect->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($productionDefect->status == 'reworked')
                            <span class="badge bg-info text-dark">Reworked</span>
                        @else
                            <span class="badge bg-danger">Scrapped</span>
