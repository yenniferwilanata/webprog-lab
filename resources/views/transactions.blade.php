@extends('include.navbar')

@section('title', 'Transaction History')

@section('content')
<div style="margin-left: 100px">
    <h1 style="color: gold; margin-bottom: 30px; padding-top: 20px">交易记录 | Transaction History</h1>
    <ul>
        @if (sizeof($transactions) == 0)
            <div class="card mx-auto" style="width: 70vw; display:flex; align-items: center; background-color: black; color: white; justify-content: center">
                <div class="card-body">
                    <div class="mx-auto" style="font-weight: bold; color: gold; text-align: center; font-size: 30px">
                        There are no transactions yet...
                    </div>
                    <div style="font-size: 20px">
                        Poof! Transaction history gone. Time to make delicious memories all over again. Let's fill this blank page
                        with savory stories and culinary adventures. Bon appétit!
                    </div>
                </div>
            </div>
        @else
        <table class="table table-bordered" style="border-color:black; ">
            <thead class="table" style="background-color: black">
                <tr class="table" style="background-color: black; text-align: center; color: gold; border-color:black">
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Purchase Date</th>
                    <th scope="col">Food Name</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr class="align-middle" style="background-color: dimgrey; color: white; text-align: center; font-weight: bold">
                    <td>TR{{str_pad($transaction->transactionHeader->id, 3, "0", STR_PAD_LEFT)}}</td>
                    <td>{{date_format($transaction->created_at, "Y-m-d")}}</td>
                    <td>{{$transaction->item_name}} [x{{$transaction->qty}}]</td>
                    <td>${{$transaction->item_price * $transaction->qty}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </ul>
</div>
@endsection