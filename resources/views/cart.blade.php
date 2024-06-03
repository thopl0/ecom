@extends('layouts.app') @section('content')

<div class="container">
    @if ($cartItems->count() == 0)
    <h1
        style="
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            margin-top: 50px;
            margin-bottom: 50px;
        "
    >
        Your cart is empty
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
                <th>Quantity</th>
                <th>Total Price</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                <tr class="align-middle alert border-bottom" role="alert">
                    <td class="text-center">
                        <img
                            class="pic"
                            src="/upload/{{ $cartItem->product->image }}"
                            alt=""
                        />
                    </td>
                    <td style="text-align: left">
                        <div>
                            <p class="m-0 fw-bold text-dark">
                                {{ $cartItem->product->name }}
                            </p>
                            <p class="m-0 text-muted">
                                {{ $cartItem->product->category->name }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="fw-600">
                            ${{ $cartItem->product->price }}
                        </div>
                    </td>
                    <td>{{$cartItem->quantity}}</td>
                    <td>
                        ${{$cartItem->quantity * $cartItem->product->price}}
                    </td>
                    <td>
                        <form action="/deletecartitem" method="POST">
                            @csrf
                            <input
                                type="text"
                                hidden
                                value="{{ $cartItem->id }}"
                                name="cartId"
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
                <tr>
                    <td colspan="4" style="text-align: left; font-size: 18px">
                        Total Price
                    </td>
                    <td style="text-align: center; font-size: 18px">
                        ${{$cartItems->total}}
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right">
                        <a href="/payment" class="btn btn-outline-primary mt-2"
                            >Proceed to Payment</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
