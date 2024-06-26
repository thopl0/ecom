@extends('layouts.app')

@section('content')
<section>
    <div class="container-fluid p-5">
        <div class="mx-auto" style="width: 50%">
            <div class="card-title text-center mt-3">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
                <form action="/newcategory" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="productname">Category Name:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Enter Category Name"
                            name="category"
                        />
                        <div class="invalid-feedback">
                            Category Name Can't Be Empty
                        </div>
                    </div>
                    <p class="mt-3">Category Image:</p>
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
                        Add Category
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