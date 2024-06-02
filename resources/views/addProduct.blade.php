@extends('layouts.app') @section('content')
<section>
    <div class="container-fluid p-5">
        <div class="mx-auto" style="width: 50%">
            <div class="card-title text-center mt-3">
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form
                    action="/newproduct"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group mt-3">
                        <label for="productname">Product Name:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Enter Product Name"
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
                        ></textarea>
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
                            <option value="{{ $category->id }}">
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
                            required
                            name="image"
                        />
                        <label class="custom-file-label" for="productimage"
                            >Choose file...</label
                        >
                        <div class="invalid-feedback">
                            File Format Not Supported
                        </div>
                        <img
                            src=""
                            alt=""
                            style="
                                width: 100%;
                                height: 200px;
                                object-fit: cover;
                                display: none;
                            "
                            id="imagepreview"
                        />
                    </div>
                    <button
                        class="btn btn-dark mt-5 mx-auto d-block"
                        type="submit"
                    >
                        Add Product
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
                document.getElementById("imagepreview").style.display = "block";
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    const input = document.getElementById("productimage");
    input.addEventListener("change", (e) => readURL(e.target));
</script>
@endsection
