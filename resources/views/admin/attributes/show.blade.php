<!-- resources/views/admin/attributes/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Attribute Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $attribute->name }}</h5>
            <p class="card-text">Parent: {{ $attribute->parent ? $attribute->parent->name : 'N/A' }}</p>
            <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection