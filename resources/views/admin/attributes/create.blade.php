<!-- resources/views/admin/attributes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Attribute</h1>

    <form action="{{ route('admin.attributes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Attribute</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">None</option>
                @foreach ($attributes as $attribute)
                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection