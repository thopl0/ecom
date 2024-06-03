@extends('layouts.app') @section('content')

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @foreach($products as $product)
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1">
                    <img
                        class="img-fluid img-responsive rounded product-image"
                        src="/upload/{{ $product->image }}"
                    />
                </div>
                <div class="col-md-6 mt-1">
                    <h5 class="" style="font-weight: bold">
                        {{ $product->name }}
                    </h5>
                    <p
                        class="badge bg-pastel-primary text-primary text-uppercase-bold-sm"
                    >
                        {{ $product->category->name }}
                    </p>
                    <p class="text-justify para mb-0 description">
                        {{ $product->description }}
                    </p>
                </div>
                <div
                    class="align-items-center align-content-center col-md-3 border-left mt-1"
                >
                    <div class="products-price">
                        <h4 class="mr-1">${{ $product->price }}</h4>
                        <span class="strike-text"
                            >${{ $product->price + $product->price*0.5}}</span
                        >
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                        <button class="btn btn-primary btn-sm" type="button">
                            View Details
                        </button>
                        <form action="/addtocart" method="POST" class="flex-shrink-0 flex-grow-1">
                            @csrf
                            <input type="text" hidden value="{{ $product->id }}" name="productId" id="">
                            <input type="number" hidden value="1" name="quantity" id="">
                            <button
                                class="btn btn-outline-primary btn-sm mt-2"
                                type="submit"
                                style="width: 100%;"
                            >
                                Add to Cart
                            </button>
                        </form>
                        <form action="/addtowishlist" method="POST" class="flex-shrink-0 flex-grow-1">
                            @csrf
                            <input type="text" hidden value="{{ $product->id }}" name="productId" id="">
                            <button
                                class="btn btn-outline-primary btn-sm"
                                type="submit"
                                style="width: 100%;"
                            >
                                Add to Wishlist
                            </button>
                        </form>
                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</div>
