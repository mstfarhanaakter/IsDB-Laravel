@extends('layouts.app')

@section('title', 'Inspection Details')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Inspection Details</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>ID:</strong> {{ $inspection->id }}</p>
        <p><strong>Production:</strong> {{ $inspection->production->name ?? 'N/A' }}</p>
        <p><strong>Inspector:</strong> {{ $inspection->inspector_name }}</p>
        <p><strong>Inspection Date:</strong> {{ \Carbon\Carbon::parse($inspection->inspection_date)->format('d-m-Y') }}</p>
        <p><strong>Status:</strong> 
            @if($inspection->status=='passed')
                <span class="text-green-600 font-semibold">Passed</span>
            @elseif($inspection->status=='failed')
                <span class="text-red-600 font-semibold">Failed</span>
            @else
                <span class="text-yellow-600 font-semibold">Pending</span>
            @endif
        </p>
        <p><strong>Remarks:</strong> {{ $inspection->remarks ?? '-' }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('qc.inspections.index') }}" class="text-blue-500 hover:underline">Back to List</a>
    </div>
</div>
@endsection
