@extends('include.navbar')

@section('title', 'Add New Food')

@section('content')
@include('include.error')
@if (isset($success))
    <div class="row justify-content-center">
        <div class="col-4 position-absolute" style="z-index: 10000;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Item created!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
<div style="margin-left: 100px; margin-right: 100px">
    <h1 style="color: gold; margin-bottom: 30px; font-weight: bold">添加新食物 | Add New Food</h1>
    <form action="/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="name" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Name</div>
            </label>
            <input type="text" class="form-control" name="name" placeholder="Min 5 Characters">
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="brief_description" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Brief Description</div>
            </label>
            <textarea type="text" class="form-control" name="brief_description" placeholder="Maximum 100 Characters"></textarea>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="full_description" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Full Description</div>
            </label>
            <textarea type="text" class="form-control" name="full_description" placeholder="Maximum 255 Characters"></textarea>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="category" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Category</div>
            </label><br>
            <select class="mx-auto" name="type" style="font-size: 20px; width: 100%; height: 35px">
                <option value="main">Main Course</option>
                <option value="beverage">Beverage</option>
                <option value="dessert">Dessert</option>
            </select>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="price" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Price</div>
            </label>
            <input type="number" class="form-control" name="price" placeholder="Must be more than 0">
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Picture</div>
            </label>
            <input class="form-control" type="file" id="picture" name="picture">
        </div>

        <div style="text-align: right">
            <button type="submit" class="btn" style="color:gold; background-color: black">Cancel</button>
            <button type="submit" class="btn" style="color:gold; background-color: black">Save</button>
        </div>

    </form>
</div>

@endsection