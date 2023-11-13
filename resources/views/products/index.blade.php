@extends('layouts.app')
@section('main')
<div class="container">
    <div class="float-end">
        <a href="products/create" class="btn btn-dark mt-2">New Product</a>
    </div>
    <h1>Products</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td><a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
                <td>
                    <img src="products/{{$product->image}}" alt="" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                    <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-small">Edit</a>
                    <!-- <a href="" class="btn btn-danger btn-small">Delete</a> -->
                    <form method="POST" class="d-inline" action="products/{{$product->id}}/delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-small">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection