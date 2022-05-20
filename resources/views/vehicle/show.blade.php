@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('vehicles.index') }}" class="btn btn-primary mt-4 mb-4">
                    Back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="bg-white col p-4 rounded rounded-2 col-md-8">
                <div class="card">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $product->name }}
                        </h5>
                        <p class="card-text">{{ $product->summary }}</p>

                        <p class="card-text">{{ $product->description }}</p>

                        <h4>Rs. {{ number_format($product->price, 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
