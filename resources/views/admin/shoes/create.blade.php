<!-- resources/views/admin/shoes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Shoe</h1>

    <form action="{{ route('admin.shoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="com_id">Company</label>
            <select name="com_id" id="com_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
