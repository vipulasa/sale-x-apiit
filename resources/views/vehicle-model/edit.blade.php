@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="bg-white col p-4 rounded rounded-2 col-md-8">
                <form class="row g-3" method="POST" action="{{ route('vehicle-models.update', $vehicleModel->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vehicle Model</h5>

                            <div class="row mb-2">
                                <div class="col-md-12 pt-3">
                                    <label for="manufacturer_id" class="form-label">Manufacturer</label>
                                    <select class="form-select @error('manufacturer_id') is-invalid @enderror"
                                        id="manufacturer_id" name="manufacturer_id">
                                        <option value="">Select</option>
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->id }}"
                                                {{ old('manufacturer_id', $vehicleModel->manufacturer_id) == $manufacturer->id ? 'selected' : '' }}>
                                                {{ $manufacturer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('manufacturer_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <x-text-field field-id="name" label="Name" help-text="Vehicle Model Name" type="text"
                                        :model="$vehicleModel" />
                                </div>
                                <div class="col-md-6">
                                    <x-text-field field-id="description" label="Description"
                                        help-text="Small description about the vehicle model" type="text"
                                        :model="$vehicleModel" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @if ($vehicleModel->image)
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="" style="width: 100px">
                                    @endif
                                </div>
                                <div class="col-md-12 pt-3">
                                    <label for="image" class="form-label">Vehicle Model Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror" />
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('vehicle-models.destroy', $vehicleModel->id) }}" method="POST"
                    id="delete-{{ $vehicleModel->id }}-vehicle-model">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger"
                        onclick="confirm('Are you sure you want to delete {{ $vehicleModel->name }} ?') ? document.getElementById('delete-{{ $vehicleModel->id }}-vehicle-model').submit() : null">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
