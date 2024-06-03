@extends('layouts.app') @section('content')

<div class="container">
    @if ($orderItems->count() == 0)
    <h1
        style="
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            margin-top: 50px;
            margin-bottom: 50px;
        "
    >
        You haven't ordered yet.
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
                @foreach($orderItems as $orderItem)
                <tr class="align-middle alert border-bottom" role="alert">
                    <td class="text-center">
                        <img
                            class="pic"
                            src="/upload/{{ $orderItem->product->image }}"
                            alt=""
                        />
                    </td>
                    <td style="text-align: left">
                        <div>
                            <p class="m-0 fw-bold text-dark">
                                {{ $orderItem->product->name }}
                            </p>
                            <p class="m-0 text-muted">
                                {{ $orderItem->product->category->name }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="fw-600">
                            ${{ $orderItem->product->price }}
                        </div>
                    </td>
                    <td>{{$orderItem->quantity}}</td>
                    <td>
                        ${{$orderItem->quantity * $orderItem->product->price}}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
