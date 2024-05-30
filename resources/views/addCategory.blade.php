@extends('layouts.app')

@section('content')
<section>
    <div class="container-fluid p-5">
        <div class="mx-auto" style="width: 50%">
            <div class="card-title text-center mt-3">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
                <form action="/addCategory" method="POST">
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
@endsection