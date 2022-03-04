@extends('product.layouts')

@section('content')
    <div class="container" style="padding-top : 12%">
        <div class="card ">

            <div class="card-body">
                <p class="card-text"> Product Name : {{ $product->name }}</p>
            </div>
        </div>

    </div>
    <div class="container" style="padding-top : 2%">


        <div class="form-group">
            <label for="exampleFormControlInput1"> {{ $product->name }}</label>

        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> {{ $product->price }} SR</label>


        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">{!! $product->detail !!}</label>

        </div>
        <form action="{{ route('products.index', $product->id) }}">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">back</button>
            </div>
        </form>


    </div>
@endsection
