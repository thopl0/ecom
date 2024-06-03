@extends('layouts.app')
@section('content')
<div style="width: 100%; height: calc(100vh - 70px); display: flex; justify-content: center; align-items: center;">
    <div class="success-card" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <div
            style="
                border-radius: 200px;
                height: 200px;
                width: 200px;
                background: #f8faf5;
                margin: 0 auto;
            "
        >
        @if($status == "failure")
            <i class="failure">✗</i>
        @else
            <i  class="success">✓</i>
        @endif
        </div>
        <h1 style="{{ $status == "failure" ? "color: #bc6666;" : "color: green;"}}">{{ $status == "failure" ? "Failed" : "Success" }}</h1>
        <p style="font-size: 18px; font-weight: 500; text-align: center; width: 70%;">
            {{$status == "failure" ? "Your payment was not successful. Please try again." : "Your payment was successful. Thank you for shopping with us."}}
        </p>
        <a href="{{ route('products') }}" class="btn btn-primary mt-2">Go to Shop</a>
    </div>
</div>
@endsection
