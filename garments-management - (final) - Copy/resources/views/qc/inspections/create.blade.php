@extends('layouts.app')

@section('title', 'Add Inspection')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Add New Inspection</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('qc.inspections.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Production</label>
            <select name="production_id" class="w-full border px-3 py-2 rounded">
                <option value="">Select Production</option>
                @foreach($productions as $production)
                    <option value="{{ $production->id }}" {{ old('production_id') == $production->id ? 'selected' : '' }}>{{ $production->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Inspector Name</label>
            <input type="text" name="inspector_name" value="{{ old('inspector_name') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Inspection Date</label>
            <input type="date" name="inspection_date" value="{{ old('inspection_date') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="pending" {{ old('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="passed" {{ old('status')=='passed'?'selected':'' }}>Passed</option>
                <option value="failed" {{ old('status')=='failed'?'selected':'' }}>Failed</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Remarks</label>
            <textarea name="remarks" class="w-full border px-3 py-2 rounded">{{ old('remarks') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('qc.inspections.index') }}" class="ml-2 text-gray-700">Cancel</a>
    </form>
</div>
@endsection
