@extends('layouts.master')
@section('content')

<div class="container py-5 text-center">
    <h2 class="text-success mb-3">Payment Successful!</h2>
    <p>Your payment has been processed successfully.</p>
    <p><strong>Transaction ID:</strong> {{ $transaction_id ?? 'N/A' }}</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go to Home</a>
</div>

@endsection
