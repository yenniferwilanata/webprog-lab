@extends('include.navbar')

@section('title', 'Home Page')

@section('content')
@if (isset($success))
    <div class="row justify-content-center">
        <div class="col-4 position-absolute" style="z-index: 10000;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Transaction completed successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
    <h1 style="color: gold; margin-bottom: 25px">
        菜单 | Menu
    </h1>
    <button onclick="main_course()" type="button" class="btn btn-dark" style="font-size: 15px; color:gold">
        主菜 | Main Course
    </button>
    <button onclick="beverage()" type="button" class="btn btn-dark" style="font-size: 15px; color:gold">
        饮料 | Beverages
    </button>
    <button onclick="dessert()" type="button" class="btn btn-dark" style="font-size: 15px; color:gold">
        甜点 | Desserts
    </button>

    <div id="main-heading">
        <div class="card mx-auto" style="margin-top: 10px; margin-bottom: 10px; align-items: center; background-color: black; ">
            <div class="card-body" style= "color: gold; font-size: 25px">
                主菜 | Main Course
            </div>
        </div>
    </div>

    <div class=grid id="main-grid">
        <div class=row>
            @foreach ($main_dishes as $main_dish)
            <div class="col-4">
                <a href="/item/{{$main_dish->id}}">
                <button class="btn btn-dark active" type="button" style="background-color: black; margin-top: 10px; margin-bottom: 10px" >
                    <img src="/storage/assets/items/{{$main_dish->picture}}" style="height: 215px; width: 430px; object-fit: cover">
                    <p style="color: gold; margin: auto; font-size: 20px">{{$main_dish->name}}</p>
                </button>
                </a>
            </div>
            @endforeach
        </div>
        <div class=row>
            {{ $main_dishes->links() }}
        </div>
    </div>

    <div id="beverage-heading">
        <div class="card mx-auto" style="margin-top: 10px; margin-bottom: 10px; align-items: center; background-color: black; ">
            <div class="card-body" style= "color: gold; font-size: 25px">
                饮料 | Beverages
            </div>
        </div>
    </div>


    <div class=grid id="beverage-grid">
        <div class=row>
            @foreach ($beverages as $beverage)
            <div class="col-4">
                <a href="/item/{{$beverage->id}}">
                <button class="btn btn-dark active" type="button" style="background-color: black; margin-top: 10px; margin-bottom: 10px" >
                    <img src="/storage/assets/items/{{$beverage->picture}}" style="height: 215px; width: 430px; object-fit: cover">
                    <p style="color: gold; margin: auto; font-size: 20px">{{$beverage->name}}</p>
                </button>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $beverages->links() }}
        </div>
    </div>

    <div id="dessert-heading">
        <div class="card mx-auto" style="margin-top: 10px; margin-bottom: 10px; align-items: center; background-color: black; ">
            <div class="card-body" style= "color: gold; font-size: 25px">
                甜点 | Desserts
            </div>
        </div>
    </div>

    <div class=grid id="dessert-grid">
        <div class=row>
            @foreach ($desserts as $dessert)
            <div class="col-4">
                <a href="/item/{{$dessert->id}}">
                <button class="btn btn-dark active" type="button" style="background-color: black; margin-top: 10px; margin-bottom: 10px" >
                    <img src="/storage/assets/items/{{$dessert->picture}}" style="height: 215px; width: 430px; object-fit: cover">
                    <p style="color: gold; margin: auto; font-size: 20px">{{$dessert->name}}</p>
                </button>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $desserts->links() }}
        </div>
    </div>

    <script src="/script.js"></script>
@endsection
