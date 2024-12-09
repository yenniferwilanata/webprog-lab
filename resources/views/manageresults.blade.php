@extends('include.navbar')

@section('title', 'Search')

@section('content')

<div style="margin-left: 100px">
    <h1 style="color: gold; margin-bottom: 30px; padding-top: 20px">管理食物 | Manage Foods</h1>
    <form style="margin-bottom: 30px" action="/manage" method="get">
        @csrf
        <div class="d-inline-flex mb-3">
            <input class="form-control me-2" type="search" placeholder="Enter food name" name="search" style="width: 700px" value={{$last_query}}>
            <button class="btn btn-dark">Search</button>
        </div>
        

        <div class="mb-3 radio-inline" style="color: white">
            Filter By Category

            <input type="checkbox" id="main-course" class = "form-check-input" style="margin-left: 10px" name="main" @if ($categories_b['Main Course'])
                checked
            @endif>
            <label for="main-course" class="form-check-label" >Main Course</label>

            <input type="checkbox" id="beverages" class = "form-check-input" style="margin-left: 10px" name="beverage" @if ($categories_b['Beverage'])
                checked
            @endif>
            <label for="beverages">Beverages</label>

            <input type="checkbox" id="dessert" class = "form-check-input" style="margin-left: 10px" name="dessert" @if ($categories_b['Dessert'])
            checked
            @endif>
            <label for="dessert">Dessert</label>
        </div>
        
    </form> 
    @if (sizeof($products) > 0)
    <div class = "container" style = "margin-left: 0px">
        <div class = "row row-cols-2">
        @foreach ($products as $product)
                <div class = "col">
                    <div class="card text-white bg-dark mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="storage/assets/items/{{ $product->picture }}" class="img-fluid rounded-start" alt="No Picture Found" style="object-fit: cover; height: 100%">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="color: gold; font-weight: bold">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <ul class="list-unstyled">
                                        <li style="font-weight: bold">Category</li>
                                        <li>{{ $product->type }}</li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li style="font-weight: bold">Description</li>
                                        <li>{{ $product->brief_description }}</li>
                                    </ul>
                                </p>
                                <form action="/manage" method="POST">
                                    @csrf
                                    <div>
                                        <a href="/update/{{ $product->id }}"><button type="button" class="btn btn-secondary">Update</button></a>
                                        <button type="submit" class="btn btn-danger" name="delete" value="{{ $product->id }}">Remove</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    @else
        <div class="d-grid gap-2" style="margin-top: 10px; margin-bottom: 10px; margin-left: 100px; margin-right: 100px">
                <button class="btn btn-dark active" type="button" style="background-color: grey; font-size: 20px; color: white" disabled>
                    Food is not available
                </button>
        </div>
    @endif
</div>

@endsection


