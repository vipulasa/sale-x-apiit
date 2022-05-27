@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1>Checkout</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @if ($cart->products && $cart->products->count())
                            @foreach ($cart->products as $product)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $product->name }}</h6>
                                        <small class="text-muted">{{  Str::limit($product->summary, 30) }}</small>
                                    </div>
                                    <span class="text-muted">${{ number_format($product->pivot->price, 2) }}</span>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{ number_format($cart->total, 2) }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Customer Information</h4>
                    <form class="bg-white p-4 rounded border" method="POST" action="{{ route('cart.thank-you', $cart->id) }}">
                    @csrf

                        <div class="row">
                            <div class="col-md-12 pt-3">
                                <label for="title" class="form-label">Title</label>
                                <select class="form-select @error('title') is-invalid @enderror" id="title"
                                    name="title">
                                    <option value="">Select</option>
                                    @foreach (['mr', 'mrs', 'miss', 'dr', 'prof', 'etc'] as $title)
                                        <option value="{{ $title }}"
                                            {{ old('title', $user->title) == $title ? 'selected' : '' }}>
                                            {{ ucfirst($title) }}.
                                        </option>
                                    @endforeach
                                </select>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" value="{{ old('first_name', $user->first_name) }}"
                                    class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                    name="first_name" />
                                <div id="Help" class="form-text">User First Name</div>
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" value="{{ old('last_name', $user->last_name) }}"
                                    class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                    name="last_name" />
                                <div id="Help" class="form-text">User Last Name</div>
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-6">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" id="gender-male" value="male"
                                        {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender-male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" id="gender-female" value="female"
                                        {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender-female">
                                        Female
                                    </label>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday"
                                    value="{{ old('birthday', $user->birthday) }}" />
                                <div id="Help" class="form-text"></div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-6">
                                <label for="address_1" class="form-label">Address 1</label>
                                <input type="text" value="{{ old('address_1', $user->address_1) }}"
                                    class="form-control @error('address_1') is-invalid @enderror" id="address_1"
                                    name="address_1" />
                                <div id="Help" class="form-text">Address 1</div>
                                @error('address_1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="address_2" class="form-label">Address 2</label>
                                <input type="text" value="{{ old('address_2', $user->address_2) }}"
                                    class="form-control" id="address_2" name="address_2" />
                                <div id="Help" class="form-text">Address 2</div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" value="{{ old('city', $user->city) }}"
                                    class="form-control @error('city') is-invalid @enderror" id="city" name="city" />
                                <div id="cityHelp" class="form-text">User City</div>
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="postcode" class="form-label">Post Code</label>
                                <input type="text" value="{{ old('postcode', $user->postcode) }}"
                                    class="form-control @error('postcode') is-invalid @enderror" id="postcode"
                                    name="postcode" />
                                <div id="postcodeHelp" class="form-text">User Post Code</div>
                                @error('postcode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="county" id="county" value="LK">

                        <div class="row pt-3">
                            <div class="col-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" value="{{ old('phone', $user->phone) }}" class="form-control"
                                    id="phone" name="phone" />
                                <div id="phoneHelp" class="form-text"></div>
                            </div>
                            <div class="col-6">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" value="{{ old('mobile', $user->mobile) }}"
                                    class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                    name="mobile" />
                                <div id="mobileHelp" class="form-text"></div>
                                @error('mobile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" type="radio" class="custom-control-input" checked
                                    required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Complete Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
