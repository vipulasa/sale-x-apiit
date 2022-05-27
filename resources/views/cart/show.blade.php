@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1>My Cart - #{{ $cart->id }}</h1>
        </div>

        <div class="container">
            <div class="row">
                @if ($cart->products && $cart->products->count())
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->products as $product)
                                    <tr>
                                        <td class="col-sm-8 col-md-6">
                                            <div class="media">
                                                <a class="thumbnail pull-left" href="#"> <img class="media-object"
                                                        src="{{ asset('storage/' . $product->image) }}"
                                                        style="width: 72px; height: 72px;"> </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#">{{ $product->name }}</a></h4>
                                                    <h5 class="media-heading"> by <a
                                                            href="#">{{ $product->manufacturer->name }}</a></h5>
                                                    <span>Status: </span>
                                                    <span class="text-success">
                                                        <strong>In Stock</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center">
                                            <form action="{{ route('cart.update', $cart->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                <input type="number" class="form-control" name="quantity"
                                                value="{{ $product->pivot->quantity }}">
                                                <button type="submit" class="btn btn-sm btn-info">
                                                    <span class="glyphicon glyphicon-remove"></span> Update
                                                </button>
                                            </form>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>$
                                                {{ number_format($product->pivot->price, 2) }}</strong></td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>$
                                                {{ number_format($product->pivot->total, 2) }}</strong></td>
                                        <td class="col-sm-1 col-md-1">
                                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                                id="delete-{{ $product->id }}-product" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirm('Are you sure you want to remove {{ $product->name }} ?') ? document.getElementById('delete-{{ $product->id }}-product').submit() : null">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-end">
                                        <h3>Total</h3>
                                    </td>
                                    <td class="text-end" colspan="2">
                                        <h3><strong>$ {{ number_format($cart->total, 2) }}</strong></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end">
                                        <a href="{{  route('cart.checkout', $cart->id) }}"
                                            class="btn btn-success btn-lg">
                                            Checkout
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <h3>Hey, You do not have any products in the cart..</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
