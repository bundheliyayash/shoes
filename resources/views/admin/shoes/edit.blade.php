<!-- resources/views/admin/shoes/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Shoe</h1>

    <form action="{{ route('admin.shoes.update', $shoe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="com_id">Company</label>
            <select name="com_id" id="com_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $shoe->com_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $shoe->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $shoe->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection