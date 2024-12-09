@extends('include.navbar')

@section('title', 'Checkout')

@section('content')
@include('include.error')
<div class="card text-gold col-8 mx-auto mb-3" style="background-color:black; color: gold; font-size: 30px; text-align: center; font-weight: bold">
    查看 | Checkout
</div>

<div class="col-8 mx-auto">
    <p class="mb-1" style="color: white; font-size: 25px">Billing Information</p>
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex justify-content-between">
            <div class="col mb-3" style="text-align:left">
                <label for="name" class="form-label" style="color: gold; font-size: 20px">
                    <div class="card text-gold" style="background-color: black">Full Name</div>
                </label>
                <input type="text" class="form-control" name="full_name" placeholder="Min 5 characters">
            </div>

            <div class="col mb-3" style="text-align:left">
                <label for="phonenumber" class="form-label" style="color: gold; font-size: 20px">
                    <div class="card text-gold" style="background-color: black">Phone Number</div>
                </label>
                <input type="text" class="form-control" name="phone" placeholder="Has to be 12 numbers">
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-md-6 mb-3" style="text-align:left">
                <label for="country" class="form-label" style="color: gold; font-size: 20px">
                    <div class="card text-gold" style="background-color: black">Country</div>
                </label>
                <input type="text" class="form-control" name="country" placeholder="Afghanistan">
            </div>

            <div class="col-md-6 mb-3" style="text-align:left">
                <label for="city" class="form-label" style="color: gold; font-size: 20px">
                    <div class="card text-gold" style="background-color: black">City</div>
                </label>
                <input type="text" class="form-control" name="city" placeholder="Min 5 Characters">
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-md-6 mb-3" style="text-align:left">
                <label for="cardname" class="form-label" style="color: gold; font-size: 20px">
                    <div class="card text-gold" style="background-color: black">Card Name</div>
                </label>
                <input type="text" class="form-control" name="card_name" placeholder="Min 3 Characters">
            </div>

            <div class="col-md-6 mb-3" style="text-align:left">
                <label for="cardnumber" class="form-label" style="color: gold; font-size: 20px">
                    <div class="card text-gold" style="background-color: black">Card Number</div>
                </label>
                <input type="text" class="form-control" name="card_number" placeholder="Must be numerical and have 16 characters">
            </div>
        </div>

        <p class="mb-1" style="color: white; font-size: 25px;">Additional Information</p>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="address" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Address</div>
            </label>
            <textarea class="form-control" name="address" placeholder="Min 5 Characters"></textarea>
        </div>
        
        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="zipcode" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">ZIP/Postal Code</div>
            </label>
            <input type="number" class="form-control" name="zip" placeholder="Fill with number only">
        </div>
        <div style="text-align: right">
            <button type="submit" class="btn" style="color:gold; background-color: black">Cancel</button>
            <button type="submit" class="btn" style="color:gold; background-color: black">Place Order</button>
        </div>
</form>
@endsection