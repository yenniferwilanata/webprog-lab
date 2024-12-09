@extends('include.navbar')

@section('title', 'Your Cart')

@section('content')

<div style="margin-left: 100px; margin-right: 100px">
    <h1 style="color: gold; margin-bottom: 30px; font-weight: bold">你的购物车 | Your Cart</h1>
    @if(sizeof($cart_items)==0)
    <div class="cintainer text-center">
        <div class="row align-items-center">
            <div class="card mx-auto d-flex align-items-center justify-content-center" style="width: 70vw; background-color: black; color: white; vertical-align: middle">           
                <div class="card-body">
                    <div class="mx-auto" style="font-weight: bold; color: gold; text-align: center; font-size: 30px">
                        Your cart is empty...
                    </div>
                    <div style="font-size: 20px; margin-left:30px; margin-right: 30px; margin-top: 10px">
                        Looks like your cart is on a diet! Don't worry, our delicious dishes are just a few clicks away. 
                        Start filling up your cart and let the feast begin!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <table class="table table-bordered" style="border-color:black; ">
        <thead class="table" style="background-color: black">
            <tr class="table" style="background-color: black; text-align: center; color: gold; border-color:black">
                <th scope="col">Food</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_items as $cart_item)
            <tr class="align-middle" style="background-color: dimgrey; color: white; text-align: center; font-weight: bold">
                <td>{{ $cart_item->item->name }}</td>
                <td>{{ $cart_item->item->price }}</td>
                <td><form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" value={{$cart_item->item->id}}>
                    <button class ="minus bg-dark" name="action_type" value="dec">-</button>
                    {{ $cart_item->qty }}
                    <button class ="plus bg-dark" name="action_type" value="inc">+</button>
                </form></td>
                <td>{{ $cart_item->item->price * $cart_item->qty }}</td>
                <td><form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="action_type" value="delete">
                    <input type="hidden" name="remove_id" value={{$cart_item->item->id}}>
                    <button type="submit" class="btn btn-dark">Remove</button></form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <span style="text-align: right; color: white; font-size: 30px; font-weight: bold">Total Price: ${{ $total }}</span>
        <br>
        <a href="/checkout"><button class="btn btn-dark mt-2" style="background-color: black; color: gold">Proceed to Checkout</button></a>
    </div>
    @endif
</div>

@endsection