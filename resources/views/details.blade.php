@extends('include.navbar')

@section('title', 'Food Description')

@section('content')
@if (isset($success))
    <div class="row justify-content-center">
        <div class="col-4 position-absolute" style="z-index: 10000;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Item added to your cart!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
<div class="d-grid col-6 mx-auto btn btn-dark active mt-5" style="color: gold; font-size: 30px; background-color: black" diasbled>
    食物细节 | Food Detail
</div>

<div class="card text-white col-11 mx-auto bg-dark mb-3">
    <div class="row g-0" style="background-color: black">
        <div class="col-md-6">
            <img src="/storage/assets/items/{{ $item->picture }}" class="img-fluid rounded-start" alt="No Picture Found" style="object-fit: cover; height: 100%">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title" style="color: gold; font-size: 50px">{{ $item->name }}</h5>
                <p class="card-text">
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 30px">Food Type</li>
                        <li style="font-size: 25px">{{ $item->type }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 30px">Food Price</li>
                        <li style="font-size: 25px">${{ $item->price }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 30px">Brief Description</li>
                        <li style="font-size: 25px">{{ $item->brief_description }}</li>
                    </ul>
                    <ul class="list-unstyled">
                        <li style="color: gold; font-size: 30px">About This Food</li>
                        <li style="font-size: 25px">{{ $item->full_description }}</li>
                    </ul>

                    @auth
                    @if (!Gate::allows('admin'))
                    {{-- should use ajax --}}
                    <form action="/item/{{$item->id}}" method="POST">
                        @csrf
                        <button class="btn btn-secondary mt-3" style="font-size: 20px; color: white">Add to Cart</button>
                    </form>
                    @endif
                    @endauth
                </p>
            </div>
        </div>
    </div>
</div>
@endsection