@extends('layouts.app') @section('content')
<section >
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img
                    class="card-img-top mb-5 mb-md-0"
                    src="/upload/{{ $product->image }}"
                    alt="{{ $product->name }}"
                />
            </div>
            <div class="col-md-6">
                {{-- <div class="small mb-1">{{ $product->category->name }}</div> --}}
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5 mb-5 d-flex align-items-center">
                    <span style="margin-right: 10px;">${{ $product->price }}</span>
                    <span class="text-decoration-line-through text-black-50" style="font-size: 15px;">${{ $product->price + $product->price*0.5}}</span>
                </div>
                <p class="lead">
                    {{ $product->description }}
                </p>
                <div class="d-flex">
                    <input
                        class="form-control  mx-3 px-2"
                        id="inputQuantity"
                        type="number"
                        style="max-width: 3rem"
                        value="1"
                    />
                    <button
                        class="btn btn-outline-dark flex-shrink-0"
                        type="button"
                    >
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
    <h2 class="fw-bolder mb-4">Related products</h2>
    <div
        class="row gx-4 gx-lg-5 row-cols-md-2 row-cols-xl-3  justify-content-center"
    >
        @foreach ($similarProducts as $product)
            <div class="col mb-5">
                <div class="card h-100">
                <!-- Product image-->
                <img
                    class="card-img-top"
                    src="/upload/{{ $product->image }}"
                    alt="{{ $product->name }}"
                />
                <div class="card-body p-4">
                    <div class="">
                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                    ${{ $product->price }}
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="d-flex justify-content-between align-items-baseline gap-2">
                        <button class="btn btn-outline-dark flex-shrink-0 flex-grow-1">Add to cart</button>
                        <a class="btn btn-outline-dark flex-shrink-0 flex-grow-1" href="/product/{{ $product->id }}">View Details</a>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</section>
@endsection
