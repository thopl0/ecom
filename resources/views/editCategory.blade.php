@extends('layouts.app')

@section('content')
<section>
    <div class="container-fluid p-5">
        <div class="mx-auto" style="width: 50%">
            <div class="card-title text-center mt-3">
                <h3>Edit Category</h3>
            </div>
            <div class="card-body">
                <form action="/updatecategory" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input
                        type="text"
                        hidden
                        value="{{$category -> id}}"
                        name="id"
                    />
                    <div class="form-group mt-3">
                        <label for="productname">Category Name:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Enter Category Name"
                            name="category"
                            value="{{$category -> name}}"
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
                            name="image"
                        />
                        <label class="custom-file-label" for="productimage"
                            >Choose file...</label
                        >
                        <div class="invalid-feedback">
                            File Format Not Supported
                        </div>
                        <img
                            src="/upload/{{ $category->image }}"
                            alt=""
                            style="
                                width: 100%;
                                height: 200px;
                                object-fit: cover;
                            "
                            id="imagepreview"
                        />
                    <button
                        class="btn btn-dark mt-5 mx-auto d-block"
                        type="submit"
                    >
                        Edit Category
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@if(session('success') || session('error'))
<div>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
</div>
@endif
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