<!-- resources/views/admin/companies/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Companies</h1>
        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Add Company</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>
                        <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection