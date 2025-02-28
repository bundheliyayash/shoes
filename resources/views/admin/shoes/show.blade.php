<!-- resources/views/admin/shoes/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Shoe Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $shoe->name }}</h5>
            <p class="card-text">Company: {{ $shoe->company->name }}</p>
            <p class="card-text">Price: {{ $shoe->price }}</p>
            <img src="{{ asset($shoe->image) }}" alt="{{ $shoe->name }}" class="img-fluid">
            <a href="{{ route('admin.shoes.edit', $shoe->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.shoes.destroy', $shoe->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection