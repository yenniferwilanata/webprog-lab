<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function add_index(Request $request)
    {
        return view('add');
    }

    public function detail($id)
    {
        $item = Item::find($id);
        if (isset($item))
            return view('details', compact('item'));
        else
            abort(404);
    }

    public function order($id)
    {
        $item = Item::find($id);
        if (!isset($item))
            abort(404);
        $check = CartItem::where([
            'user_id' => auth()->user()->id,
            'item_id' => $id,
        ]);

        if (sizeof($check->get()) > 0)
        {
            $check = $check->increment('qty');
            $success = true;
            return view('details', compact('success', 'item'));
        }

        auth()->user()->cart_item()->create([
            'item_id' => $id,
            'qty' => 1,
        ]);
        $success = true;
        return view('details', compact('success', 'item'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'brief_description' => 'required|max:100',
            'full_description' => 'required|max:255',
            'type' => 'required',
            'price' => 'required|gt:0',
            'picture' => 'required|mimes:jpeg,png,jpg',
        ]);

        $filename = time() . "_" . $request->file('picture')->getClientOriginalName();
        $request->file('picture')->storeAs('/assets/items/', $filename, 'public');

        $item = new Item;
        $item->name = $request->name;
        $item->brief_description = $request->brief_description;
        $item->full_description = $request->full_description;
        $item->type  = $request->type;
        $item->price = $request->price;
        $item->picture = $filename;
        $item->save();
        $success = true;
        return view('add', compact('success'));
    }

    public function manage_index(Request $request)
    {
        if (empty($request->all()))
            return view('manage');
        else
            return $this->manage_search($request);
    }

    public function manage_search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $last_query = $request->search;

        $categories_b = [
            'Main Course' => $request->main,
            'Beverage' => $request->beverage,
            'Dessert' => $request->dessert,
        ];
        $categories = [];
        
        foreach ($categories_b as $key => $value)
        {
            if (!$value)
                continue;
            $categories[] = $key;
        }
        
        $products = Item::where("name", "LIKE", "%$request->search%")->whereIn('type', $categories);
        $products = $products->get();
        return view('manageresults', compact('products', 'last_query', 'categories_b'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'delete' => 'required'
        ]);

        $item = Item::find($request->delete);
        if (!isset($item))
            abort(403);
    
        try 
        {
            $item->delete();
        }
        catch (\Exception $e)
        {
            $item->delete();
        }
        return back();
    }

    public function update_index($id)
    {
        $item = Item::find($id);
        if (!isset($item))
            abort(404);
        return view('update', compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'brief_description' => 'required|max:100',
            'full_description' => 'required|max:255',
            'type' => 'required',
            'price' => 'required|gt:0',
            'picture' => 'required|mimes:jpeg,png,jpg',
        ]);
        
        $item = Item::find($id);
        if (!isset($item))
            abort(404);
        
        $filename = time() . "_" . $request->file('picture')->getClientOriginalName();
        $request->file('picture')->storeAs('/assets/items/', $filename, 'public');
    
        $item->name = $request->name;
        $item->brief_description = $request->brief_description;
        $item->full_description = $request->full_description;
        $item->type  = $request->type;
        $item->price = $request->price;
        $item->picture = $filename;
        $item->save();
        $success = true;
        return view('update', compact('item', 'success'));
    }
}
