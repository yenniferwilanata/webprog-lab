<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function display()
    {
        $cart_items = CartItem::whereBelongsTo(auth()->user())->get();
        $total = 0;
        foreach ($cart_items as $item)
        {
            $total += $item->qty * $item->item->price;
        }
        return view('cart', compact('cart_items', 'total'));
    }

    public function process(Request $request)
    {
        if ($request->action_type == "delete")
            return $this->delete($request);
        else if ($request->action_type == "inc")
            return $this->increment($request);
        else if ($request->action_type == "dec")
            return $this->decrement($request);
    }

    private function delete(Request $request)
    {
        CartItem::where([
            'user_id' => auth()->user()->id,
            'item_id' => $request->remove_id
        ])->delete();
        return back();
    }

    private function increment(Request $request)
    {
        CartItem::where([
            'user_id' => auth()->user()->id,
            'item_id' => $request->item_id,
        ])->increment('qty');
        return back();
    }

    private function decrement(Request $request)
    {
        $item = CartItem::where([
            'user_id' => auth()->user()->id,
            'item_id' => $request->item_id,
        ]);
        $item->decrement('qty');
        if ($item->get()[0]->qty <= 0)
            $item->delete();
        return back();
    }
}
