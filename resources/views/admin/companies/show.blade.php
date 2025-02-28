<!-- resources/views/admin/companies/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Company Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text">ID: {{ $company->id }}</p>
            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection