<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Shows the contents of the shopping cart.
     */
    public function index() 
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * Adds a product to the cart session.
     */
    public function add($id) 
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    /**
     * Updates the quantity of a specific item in the cart.
     */
    public function update(Request $request) 
    {
        if($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour.');
        }
    }

    /**
     * Removes an item from the cart.
     */
    public function remove($id) 
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Produit retiré.');
    }

    /**
     * Clears the cart after the user "pays" on the payment page.
     */
    public function checkout() 
    {
        if(!session('cart')) {
            return redirect('/');
        }
        
        // We "forget" the cart items because the order is finished
        session()->forget('cart');
        
        // We set a temporary 'payment_confirmed' status to allow access to success page
        return redirect()->route('cart.success')->with('payment_confirmed', true);
    }

    /**
     * Displays the final confirmation page.
     */
    public function success() 
    {
        // If they didn't just pay, redirect them to the home page
        if (!session('payment_confirmed')) {
            return redirect('/');
        }
        return view('cart.success');
    }
}