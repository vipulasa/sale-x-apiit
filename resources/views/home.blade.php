@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                @can('accessCustomerFeatures')
                    <h1 class="display-5 fw-bold">Welcome {{ auth()->user()->name }}</h1>
                @elsecan('accessAdminFeatures')
                    <h1 class="display-5 fw-bold">Welcome Admin : {{ auth()->user()->name }}</h1>
                @else
                    <h1 class="display-5 fw-bold">Sale X APIIT</h1>
                @endcan
                <p class="col-md-8 fs-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quasi cupiditate eveniet reiciendis
                    eius perspiciatis porro recusandae, quisquam ea quidem harum deleniti perferendis at fugiat voluptate?
                    Dolore, esse. Totam, deserunt?
                </p>
                <button class="btn btn-primary btn-lg" type="button">Shop Now</button>
            </div>
        </div>
    </div>
@endsection
