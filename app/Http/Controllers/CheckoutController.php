<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Item;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'full_name' => 'required|min:5',
            'phone' => 'required|digits:12',
            'address' => 'required|min:5',
            'city' => 'required|min:5',
            'card_name' => 'required|min:3',
            'card_number' => 'required|min:16',
            'country' => 'required',
            'zip' => 'required|numeric'
        ]);

        $cart = CartItem::whereBelongsTo(auth()->user());
        $cart_items = $cart->get();
        $header = auth()->user()->transaction_header()->create();
        foreach ($cart_items as $cart_item)
        {
            TransactionDetail::create([
                'transaction_header_id' => $header->id,
                'item_name' => $cart_item->item->name,
                'item_price' => $cart_item->item->price,
                'qty' => $cart_item->qty,
            ]);
        }
        $cart->delete();
        $success = true;
        $main_dishes = Item::where('type', 'Main Course')->paginate(6);
        $beverages = Item::where('type', 'Beverage')->paginate(6);
        $desserts = Item::where('type', 'Dessert')->paginate(6);
        return view('index', compact('main_dishes', 'beverages', 'desserts', 'success'));
    }
}
