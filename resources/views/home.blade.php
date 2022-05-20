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

                <div class="row">
                    @if ($products && $products->count())
                        @foreach ($products as $product)
                            <div class="col-4">
                                <div class="card mx-1">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                            alt="...">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $product->name }}
                                        </h5>
                                        <p class="card-text">{{ $product->summary }}</p>

                                        <h4>USD. {{ number_format($product->price, 2) }}</h4>

                                        @auth
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="number" name="quantity" value="1" />
                                                <button type="submit" class="btn btn-primary btn-lg mt-4">
                                                    Add To Cart
                                                </button>
                                            </form>
                                        @endauth

                                        @guest
                                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-4">
                                                Login to Buy
                                            </a>
                                        @endguest

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
