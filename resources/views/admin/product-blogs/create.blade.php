<!-- resources/views/admin/product-blogs/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Product Blog</h1>

    <form action="{{ route('admin.product-blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="shoes_id">Shoe</label>
            <select name="shoes_id" id="shoes_id" class="form-control" required>
                @foreach ($shoes as $shoe)
                    <option value="{{ $shoe->id }}">{{ $shoe->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="product_story">Product Story</label>
            <textarea name="product_story" id="product_story" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection