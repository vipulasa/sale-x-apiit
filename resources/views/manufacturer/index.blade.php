@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('manufacturers.create') }}" class="btn btn-primary mt-4 mb-4">
                    Add Manufacturer
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manufacturers as $manufacturer)
                            <tr>
                                <th scope="row">{{ $manufacturer->id }}</th>
                                <td>{{ $manufacturer->name }}</td>
                                <td>{{ $manufacturer->description }}</td>
                                <td>{{ $manufacturer->is_active ? 'Published' : 'Not Published' }}</td>
                                <td>
                                    <a href="{{ route('manufacturers.show', $manufacturer->id) }}" class="btn btn-sm btn-success">View</a>
                                    <a href="{{ route('manufacturers.edit', $manufacturer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('manufacturers.destroy', $manufacturer->id) }}" method="POST"
                                        id="delete-{{ $manufacturer->id }}-manufacturer" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirm('Are you sure you want to delete {{ $manufacturer->name }} ?') ? document.getElementById('delete-{{ $manufacturer->id }}-manufacturer').submit() : null">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $manufacturers->links() }}
            </div>
        </div>
    </div>
@endsection
