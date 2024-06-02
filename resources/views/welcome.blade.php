@extends('layouts.app') @section('content')
<header
    class="py-5"
    style="
        position: relative;
        background: url('https://images.pexels.com/photos/777001/pexels-photo-777001.jpeg')
            fixed bottom no-repeat;
        background-size: cover;
        height: 400px;
    "
>
    <div
        class="container px-4 px-lg-5"
        style="position: relative; z-index: 2; margin-top: 110px"
    >
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Upgrade Your Play</h1>
            <p class="lead fw-normal text-white mb-0">
                Latest Consoles, Games, and Accessories
            </p>
        </div>
    </div>
    <div
        style="
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100;
            z-index: 0;
        "
    ></div>
</header>

<section class="pt-8 pt-md-9">
    <div class="container">
      <div class="row mt-6">
        <div class="col-12 mb-4">
          <span class="badge bg-pastel-primary text-primary text-uppercase-bold-sm">
            All categories
          </span>
        </div>

        <!-- Category -->
        @foreach ($categories as $category)
          <div class="col-md-3 mb-4">
            <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
              <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
                <img src="upload/{{ $category->image }}" alt="" style="width: 32px; height: 32px">
              </span>
              <span class="text-dark mt-3">
                {{ $category->name }}
              </span>
            </a>
          </div>
        @endforeach
        
      </div>
    </div>
  </section>

<section class="py-5">
    <div class="container mt-5">
         <div class="col-12 mb-4">
          <span class="badge bg-pastel-primary text-primary text-uppercase-bold-sm">
            All Products
          </span>
        </div>
        <div
            class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 justify-content-center"
        >
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <img
                        class="card-img-top"
                        src="upload/{{ $product->image }}"
                        alt="{{ $product->name }}"
                        style="width: 100%; height: 200px; object-fit: cover"
                    />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <p>{{ $product->category->name }}</p>
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product price-->
                            <p>${{ $product->price }}</p>
                            {{-- {{ $product }} --}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div
                        class="card-footer p-4 pt-0 border-top-0 bg-transparent"
                    >
                        <div class="d-flex justify-content-between align-items-baseline gap-2">
                            <button class="btn btn-outline-dark flex-shrink-0 flex-grow-1" onclick="addToCart({{ $product->id }}, 1)">Add to cart</button>
                            <a class="btn btn-outline-dark flex-shrink-0 flex-grow-1" href="/product/{{ $product->id }}">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">
            Copyright &copy; Your Website 2023
        </p>
    </div>
</footer>

@endsection
