<!-- resources/views/admin/attributes/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Attributes</h1>
        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">Add Attribute</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attributes as $attribute)
                <tr>
                    <td>{{ $attribute->id }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->parent ? $attribute->parent->name : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" class="d-inline">
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