@extends('include.navbar')

@section('title', 'Update Food')

@section('content')
@include('include.error')
@if (isset($success))
    <div class="row justify-content-center">
        <div class="col-4 position-absolute" style="z-index: 10000;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Item updated!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
<div class="card text-gold col-6 mx-auto mb-5" style="background-color:black; color: gold; font-size: 30px; text-align: center; font-weight: bold">
    更新食物 | Update Food
</div>

<div class="col-6 mx-auto">
    <form action="{{ Request::url() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="name" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Name</div>
            </label>
            <input type="text" class="form-control" name="name" placeholder="Mininum 5 Characters" value="{{$item->name}}"></textarea>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="brief_description" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Brief Description</div>
            </label>
            <textarea type="text" class="form-control" name="brief_description" placeholder="Maximum 100 characters">{{$item->brief_description}}</textarea>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="full_description" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Brief Description</div>
            </label>
            <textarea type="text" class="form-control" name="full_description" placeholder="Maximum 255 characters">{{$item->full_description}}</textarea>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="category" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Category</div>
            </label><br>
            <select class="mx-auto" name="type" style="font-size: 20px; width: 100%; height: 35px">
                <option value="Main Course"
                @if ($item->type == "Main Course")
                    selected
                @endif
                >Main dish</option>
                <option value="Beverage"
                @if ($item->type == "Beverage")
                    selected
                @endif>
                Beverage</option>
                <option value="Dessert" 
                @if ($item->type == "Dessert")
                    selected
                @endif>Dessert</option>
            </select>
        </div>

        <div class="mb-3 mx-auto" style="text-align:left">
            <label for="price" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Price</div>
            </label>
            <input type="number" class="form-control" name="price" value="{{$item->price}}">
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label" style="color: gold; font-size: 20px">
                <div class="card text-gold" style="background-color: black">Food Image</div>
            </label>
            <input class="form-control" type="file" id="picture" name="picture">
        </div>

        <div style="text-align: right">
            <button type="submit" class="btn" style="color: white; background-color: black">Update Food</button>
        </div>
    </form>
</div>

@endsection