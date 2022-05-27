<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        // create an instance of the product
        $product = (new Product())->findOrFail($validated['product_id']);

        // check if a cart exists for this authenticated user
        $cart = Cart::where('user_id', auth()->id())->first();

        // if the authenticated user has no cart, create one
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'total' => 0,
                'is_paid' => false,
            ]);
        }

        // check if the product is already in the cart and remove
        $cart->products()->detach($product->id);

        // add the product to the cart
        $cart->products()->attach([
            $product->id => [
                'quantity' => $validated['quantity'],
                'price' => $product->price,
                'total' => $product->price * $validated['quantity'],
            ]
        ]);

        // loop through the products in the cart and calculate the total
        $cart->total = 0;
        foreach ($cart->products as $product) {
            $cart->total += $product->pivot->total;
        }
        $cart->save();

        return redirect()->route('cart.show', $cart->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('cart.show', compact('cart'));
    }

    /**
     * Checkout
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request, Cart $cart)
    {
        return view('cart.checkout', [
            'cart' => $cart,
            'user' => $request->user() // auth()->user()
        ]);
    }

    /**
     * Complete payment and checkout
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function completeCheckout(Request $request, Cart $cart)
    {

        // validate the request
        $validated = $request->validate([
            "title" => "required",
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "gender" => "required",
            "birthday" => "nullable",
            "address_1" => "required|string",
            "address_2" => "nullable",
            "city" => "required|string|max:255",
            "postcode" => "required|string|max:255",
            "county" => "required|string|max:255",
            "phone" => "nullable",
            "mobile" => "required|string|max:255"
        ]);

        // get the user from the request
        $user = $request->user();

        // update the user with the validated data
        $user->update($validated);

        return view('cart.thank-you', [
            'cart' => $cart
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
         // validate the request
         $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        // create an instance of the product
        $product = (new Product())->findOrFail($validated['product_id']);

        // check if the product is already in the cart and remove
        $cart->products()->detach($product->id);

        // add the product to the cart
        $cart->products()->attach([
            $product->id => [
                'quantity' => $validated['quantity'],
                'price' => $product->price,
                'total' => $product->price * $validated['quantity'],
            ]
        ]);

        // loop through the products in the cart and calculate the total
        $cart->total = 0;
        foreach ($cart->products as $product) {
            $cart->total += $product->pivot->total;
        }
        $cart->save();

        return redirect()->route('cart.show', $cart->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        $cart->products()->detach($request->product_id);

        return redirect()->route('cart.show', $cart->id);
    }
}
