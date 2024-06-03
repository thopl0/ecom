@extends('layouts.app') @section('content')

<div class="container">
    @if ($wishlistItems->count() == 0)
    <h1
        style="
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            margin-top: 50px;
            margin-bottom: 50px;
        "
    >
        Your Wishlist is empty
    </h1>
    <a
        href="/products"
        class="btn btn-primary"
        style="margin-left: 45%; margin-bottom: 50px"
        >Shop Now</a
    >
    @else
    <div class="table-wrap">
        <table class="table table-responsive table-borderless text-center">
            <thead style="text-align: center">
                <th>Image</th>
                <th style="color: black">Product</th>
                <th style="color: black">Price</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($wishlistItems as $wishlistItem)
                <tr class="align-middle alert border-bottom" role="alert">
                    <td class="text-center">
                        <img
                            class="pic"
                            src="/upload/{{ $wishlistItem->product->image }}"
                            alt=""
                        />
                    </td>
                    <td style="text-align: left">
                        <div>
                            <p class="m-0 fw-bold text-dark">
                                {{ $wishlistItem->product->name }}
                            </p>
                            <p class="m-0 text-muted">
                                {{ $wishlistItem->product->category->name }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="fw-600">
                            ${{ $wishlistItem->product->price }}
                        </div>
                    </td>
                    <td>{{$wishlistItem->quantity}}</td>
                    <td>
                        <form action="/deletewishlistitem" method="POST">
                            @csrf
                            <input
                                type="text"
                                hidden
                                value="{{ $wishlistItem->id }}"
                                name="wishlistId"
                                id=""
                            />
                            <button
                                class="btn btn-outline-dark text-danger delete"
                                type="submit"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
