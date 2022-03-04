@extends('product.layouts')

@section('content')
    <div class="jumbotron container">


        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('products.create') }}" role="button">Create</a>
        <a class="btn btn-primary btn-lg" href="{{ route('product.trash') }}" role="button">trash</a>
    </div>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>


    <div class="container">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product name </th>
                    <th scope="col">Product price</th>
                    <th scope="col" stayle="width :200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }} SR</td>
                        <td>
                            <div class="row">
                                <div class="col-sm">
                                    <a class="btn btn-success" href="{{ route('products.edit', $item->id) }}">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-primary" href="{{ route('products.show', $item->id) }}">Show</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-warning" href="{{ route('soft.delete', $item->id) }}">SoftDelete</a>
                                {{-- </div>
                                <div class="col-sm">
                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div> --}}
                            </div>


                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {!! $products->links() !!}
    </div>
@endsection
