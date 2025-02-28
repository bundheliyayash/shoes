<!-- resources/views/admin/product-blogs/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Product Blog</h1>

    <form action="{{ route('admin.product-blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="shoes_id">Shoe</label>
            <select name="shoes_id" id="shoes_id" class="form-control" required>
                @foreach ($shoes as $shoe)
                    <option value="{{ $shoe->id }}" {{ $blog->shoes_id == $shoe->id ? 'selected' : '' }}>{{ $shoe->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $blog->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="product_story">Product Story</label>
            <textarea name="product_story" id="product_story" class="form-control" rows="5">{{ $blog->product_story }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection