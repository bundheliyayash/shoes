<!-- resources/views/admin/companies/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>

    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection