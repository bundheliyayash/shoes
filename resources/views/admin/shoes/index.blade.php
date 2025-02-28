<!-- resources/views/admin/shoes/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Shoes</h1>
        <a href="{{ route('admin.shoes.create') }}" class="btn btn-primary">Add Shoe</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shoes as $shoe)
                <tr>
                    <td>{{ $shoe->id }}</td>
                    <td>{{ $shoe->name }}</td>
                    <td>{{ $shoe->company->name }}</td>
                    <td>{{ $shoe->price }}</td>
                    <td>
                        <a href="{{ route('admin.shoes.edit', $shoe->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.shoes.destroy', $shoe->id) }}" method="POST" class="d-inline">
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
