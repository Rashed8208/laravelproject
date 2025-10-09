@extends('layouts.master')
@section('content')

<div class="container py-5 text-center">
    <h2 class="text-warning mb-3">Payment Cancelled!</h2>
    <p>You have cancelled your payment.</p>
    <a href="{{ route('checkout') }}" class="btn btn-primary mt-3">Return to Checkout</a>
</div>

@endsection
