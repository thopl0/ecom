@extends('layouts.app') @section('content')
<section>
    <div class="container-fluid p-5">
        <div class="mx-auto" style="width: 50%">
            <div class="card-title text-center mt-3">
                <h3>Edit Product</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group mt-3">
                        <label for="productname">Product Name:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="productname"
                            placeholder="Enter Product Name"
                        />
                        <div class="invalid-feedback">
                            Product Name Can't Be Empty
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="productid">Product Id:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="productid"
                            placeholder="Enter Product Id"
                        />
                        <div class="invalid-feedback">
                            Product ID Can't Be Empty
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="productprice">Product Price:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="productprice"
                            placeholder="Enter Product Price"
                        />
                        <div class="invalid-feedback">
                            Product Price Can't Be Empty
                        </div>
                    </div>
                    <p class="mt-3">Product Image:</p>
                    <image-upload></image-upload>
                    <button
                        class="btn btn-dark mt-5 mx-auto d-block"
                        type="submit"
                    >
                        Edit Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
