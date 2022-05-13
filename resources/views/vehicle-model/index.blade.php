@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('vehicle-models.create') }}" class="btn btn-primary mt-4 mb-4">
                    Add Vehicle Model
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
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicle_models as $vehicle_model)
                            <tr>
                                <th scope="row">{{ $vehicle_model->id }}</th>
                                <td>
                                    <a href="{{  route('manufacturers.show', $vehicle_model->manufacturer->id) }}">
                                        {{ $vehicle_model->manufacturer->name }}
                                    </a>
                                </td>
                                <td>{{ $vehicle_model->name }}</td>
                                <td>{{ $vehicle_model->description }}</td>
                                <td>{{ $vehicle_model->is_active ? 'Published' : 'Not Published' }}</td>
                                <td>
                                    <a href="{{ route('vehicle-models.show', $vehicle_model->id) }}" class="btn btn-sm btn-success">View</a>
                                    <a href="{{ route('vehicle-models.edit', $vehicle_model->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('vehicle-models.destroy', $vehicle_model->id) }}" method="POST"
                                        id="delete-{{ $vehicle_model->id }}-vehicle_model" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirm('Are you sure you want to delete {{ $vehicle_model->name }} ?') ? document.getElementById('delete-{{ $vehicle_model->id }}-vehicle_model').submit() : null">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $vehicle_models->links() }}
            </div>
        </div>
    </div>
@endsection
