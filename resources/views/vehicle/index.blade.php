@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('vehicles.create') }}" class="btn btn-primary mt-4 mb-4">
                    Add Vehicle
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table bg-white table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Model</th>
                            <th scope="col">Name</th>
                            <th scope="col">Summary</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>
                                    <a href="{{ route('manufacturers.show', $product->manufacturer->id) }}">
                                        {{ $product->manufacturer->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('vehicle-models.show', $product->vehicleModel->id) }}">
                                        {{ $product->vehicleModel->name }}
                                    </a>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ Str::limit($product->summary, 50) }}</td>
                                <td>{{ $product->is_active ? 'Published' : 'Not Published' }}</td>
                                <td>
                                    <a href="{{ route('vehicles.show', $product->id) }}"
                                        class="btn btn-sm btn-success">View</a>
                                    <a href="{{ route('vehicles.edit', $product->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('vehicles.destroy', $product->id) }}" method="POST"
                                        id="delete-{{ $product->id }}-vehicle" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirm('Are you sure you want to delete {{ $product->name }} ?') ? document.getElementById('delete-{{ $product->id }}-vehicle').submit() : null">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
