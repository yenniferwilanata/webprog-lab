@extends('include.navbar')

@section('title', 'Search')

@section('content')
@include('include.error')
<div style="margin-left: 100px">
    <h1 style="color: gold; margin-bottom: 30px">搜索食物 | Search Foods</h1>
    <form style="margin-bottom: 30px" action="/search" method="get">
        <div class="d-inline-flex mb-3">
            <input class="form-control me-2" type="search" placeholder="Enter food name" name="search" style="width: 700px">
            <button class="btn btn-dark">Search</button>
        </div>
        

        <div class="mb-3 radio-inline" style="color: white">
            Filter By Category

            <input type="checkbox" id="main-course" class = "form-check-input" style="margin-left: 10px" name="main" checked>
            <label for="main-course" class="form-check-label" >Main Course</label>

            <input type="checkbox" id="beverages" class = "form-check-input" style="margin-left: 10px" name="beverage" checked> 
            <label for="beverages">Beverages</label>

            <input type="checkbox" id="dessert" class = "form-check-input" style="margin-left: 10px" name="dessert" checked>
            <label for="dessert">Dessert</label>
        </div>
        
    </form> 
</div>

@endsection
