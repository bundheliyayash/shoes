<!-- resources/views/admin/companies/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Company</h1>

    <form action="{{ route('admin.companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection