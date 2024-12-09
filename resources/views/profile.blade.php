@extends('include.navbar')

@section('title', 'Profile')

@section('content')
<div class="d-grid col-6 mx-auto btn btn-dark active mt-5 mb-3" style="color: gold; font-size: 30px; background-color: black" diasbled>
    用户个人资料 | User Profile
</div>

<div class="card text-white col-11 mx-auto mb-3" style="background-color:black">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/storage/assets/profiles/{{ $user->picture }}" class="img-fluid rounded-start" alt="No Picture Found" style="object-fit: cover; height: 100%">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title" style="color: gold; font-size: 30px; text-align:center">{{ $user->name }}</h5>
                <p class="card-text">
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 25px">Phone Number</li>
                        <li style="font-size: 20px">{{ $user->phone_number }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 26px">Address</li>
                        <li style="font-size: 20px">{{ $user->address }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 26px">Email</li>
                        <li style="font-size: 20px">{{ $user->email }}</li>
                    </ul>
                    <a href="/settings"><button type="button" class="btn btn-dark" style="color:gold">Edit</button></a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection