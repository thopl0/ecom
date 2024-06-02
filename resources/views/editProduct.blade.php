@extends('layouts.app') @section('content')
<section>
    <div class="container-fluid p-5">
        <div class="mx-auto" style="width: 50%">
            <div class="card-title text-center mt-3">
                <h3>Edit Product</h3>
            </div>
            <div class="card-body">
                <form
                    action="/updateproduct"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input
                        type="text"
                        hidden
                        value="{{$product -> id}}"
                        name="id"
                    />
                    <div class="form-group mt-3">
                        <label for="productname">Product Name:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="productname"
                            placeholder="Enter Product Name"
                            value="{{$product -> name}}"
                            name="name"
                        />
                        <div class="invalid-feedback">
                            Product Name Can't Be Empty
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="productDesc">Description</label>
                        <textarea
                            type="text"
                            class="form-control"
                            id="productDesc"
                            placeholder="Enter Product Description"
                            name="description"
                            style="height: 100px"
                            >{{$product -> description}}
                        </textarea>
                        <div class="invalid-feedback">
                            Product Description Can't Be Empty
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="productprice">Product Price:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="productprice"
                            placeholder="Enter Product Price"
                            value="{{$product -> price}}"
                            name="price"
                        />
                        <div class="invalid-feedback">
                            Product Price Can't Be Empty
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="productCategory">Product Category:</label>
                        <br />
                        <select name="category" id="">
                            @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                selected="{{ $category->id == $product->category_id }}"
                            >
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Product Price Can't Be Empty
                        </div>
                    </div>
                    <p class="mt-3">Product Image:</p>
                    <div class="custom-file">
                        <input
                            type="file"
                            class="custom-file-input"
                            id="productimage"
                            name="image"
                            value="{{$product -> image}}"
                        />
                        <label class="custom-file-label" for="productimage"
                            >Choose file...</label
                        >
                        <div class="invalid-feedback">
                            File Format Not Supported
                        </div>
                        <img
                            src="/upload/{{ $product->image }}"
                            alt=""
                            style="
                                width: 100%;
                                height: 200px;
                                object-fit: cover;
                            "
                            id="imagepreview"
                        />
                    </div>
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("imagepreview").src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    const input = document.getElementById("productimage");
    input.addEventListener("change", (e) => readURL(e.target));
</script>
@endsection
