<!-- resources/views/admin/product-blogs/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Product Blog Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text">Shoe: {{ $blog->shoe->name }}</p>
            <p class="card-text">{{ $blog->content }}</p>
            <p class="card-text">{{ $blog->product_story }}</p>
            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
            <a href="{{ route('admin.product-blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.product-blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </