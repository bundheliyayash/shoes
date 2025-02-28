<!-- resources/views/admin/product-blogs/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Product Blogs</h1>
        <a href="{{ route('admin.product-blogs.create') }}" class="btn btn-primary">Add Product Blog</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Shoe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productBlogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->shoe->name }}</td>
                    <td>
                        <a href="{{ route('admin.product-blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.product-blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
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