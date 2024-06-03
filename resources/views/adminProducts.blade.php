@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="table-wrap">
            <table class="table table-responsive table-borderless table-hover table-striped text-center">
                <thead style="text-align: center">
                    <th>Image</th>
                    <th style="color: black;">Product</th>
                    <th style="color: black;">Price</th>
                    <th>&nbsp;</th>
                    <th colspan="3" style="text-align: right">
                        <a href="/addproduct" class="btn btn-outline-primary btn-sm mt-2">Add Product</a>
                    </th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="align-middle alert border-bottom" role="alert" style="text-align: left">
                        <td class="text-center">
                            <img class="pic"
                                src="/upload/{{ $product->image }}"
                                alt="">
                        </td>
                        <td>
                            <div>
                                <p class="m-0 fw-bold text-dark ">{{ $product->name }}</p>
                                <p class="m-0 text-muted">{{ $product->category->name }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="fw-600">${{ $product->price }}</div>
                        </td>
                        <td>
                            <a href="/product/{{ $product->id }}" class="btn btn-outline-dark">View</a>
                        </td>
                        <td>
                            <a href="/editproduct/{{ $product->id }}" class="btn btn-outline-dark">Edit</a>
                        </td>
                        <td>
                            <form action="/deleteproduct/{{ $product->id }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-dark text-danger delete " type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
