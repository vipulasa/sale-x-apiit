@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="bg-white col p-4 rounded rounded-2 col-md-8">

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{  $error }}</div>
                @endforeach

                <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}">

                    @method('PUT')
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Authentication</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name"
                                    name="name" value="{{ $user->name }}" />
                                    <div id="nameHelp" class="form-text">Your user name</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"
                                    name="email" value="{{ $user->email }}" />
                                    <div id="emailHelp" class="form-text">Email Address</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <label for="role" class="form-label">User Role</label>
                                    <select class="form-select" id="role" name="role">
                                        <option>Select</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Personal Information</h5>

                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <select class="form-select" id="title" name="title">
                                        <option value="">Select</option>
                                        @foreach (['mr', 'mrs', 'miss', 'dr', 'prof', 'etc'] as $title)
                                            <option value="{{ $title }}" {{ $user->title == $title ? 'selected' : '' }}>{{ ucfirst($title) }}.</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row pt-3">
                                <div class="col-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" value="{{ $user->first_name }}" class="form-control" id="first_name" name="first_name" />
                                    <div id="Help" class="form-text">User First Name</div>
                                </div>
                                <div class="col-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" value="{{ $user->last_name }}" class="form-control" id="last_name" name="last_name" />
                                    <div id="Help" class="form-text">User Last Name</div>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-male"
                                            value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-female"
                                            value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-female">
                                            Female
                                        </label>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" />
                                    <div id="Help" class="form-text"></div>
                                </div>

                                <div class="col">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio">{!! $user->bio !!}</textarea>
                                    <div id="bioHelp" class="form-text">User Bio</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Address</h5>

                            <div class="row">
                                <div class="col-6">
                                    <label for="address_1" class="form-label">Address 1</label>
                                    <input type="text" value="{{ $user->address_1 }}" class="form-control" id="address_1" name="address_1" />
                                    <div id="Help" class="form-text">Address 1</div>
                                </div>
                                <div class="col-6">
                                    <label for="address_2" class="form-label">Address 2</label>
                                    <input type="text" value="{{ $user->address_2 }}" class="form-control" id="address_2" name="address_2" />
                                    <div id="Help" class="form-text">Address 2</div>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" value="{{ $user->city }}" class="form-control" id="city" name="city" />
                                    <div id="cityHelp" class="form-text">User City</div>
                                </div>
                                <div class="col-6">
                                    <label for="postcode" class="form-label">Post Code</label>
                                    <input type="text" value="{{ $user->postcode }}" class="form-control" id="postcode" name="postcode" />
                                    <div id="postcodeHelp" class="form-text">User Post Code</div>
                                </div>
                            </div>

                            <input type="hidden" name="county" id="county" value="LK">

                            <div class="row pt-3">
                                <div class="col-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" value="{{ $user->phone }}" class="form-control" id="phone" name="phone" />
                                    <div id="phoneHelp" class="form-text"></div>
                                </div>
                                <div class="col-6">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" value="{{ $user->mobile }}" class="form-control" id="mobile" name="mobile" />
                                    <div id="mobileHelp" class="form-text"></div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
