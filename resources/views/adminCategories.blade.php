@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="table-wrap">
            <table class="table table-responsive table-borderless table-hover table-striped text-center">
                <thead style="">
                    <th>Icon</th>
                    <th>Category</th>
                    <th>&nbsp;</th>
                    <th style="text-align: right;">
                        <a href="/addcategory" class="btn btn-outline-primary btn-sm mt-2">Add New Category</a>
                    </th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="align-middle alert border-bottom" role="alert">
                        <td class="text-center">
                            <img class="pic"
                                src="/upload/{{ $category->image }}"
                                alt="">
                        </td>
                        <td>
                            <div>
                                <p class="m-0 fw-bold text-dark ">{{ $category->name }}</p>

                            </div>
                        </td>
                        <td>
                            <a href="/editcategory/{{ $category->id }}" class="btn btn-outline-dark">Edit</a>
                        </td>
                        <td>
                            <form action="/deletecategory/{{ $category->id }}" method="POST">
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
