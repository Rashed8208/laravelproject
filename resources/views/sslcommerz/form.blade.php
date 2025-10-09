@extends('layouts.master')
@section('content')

<div class="container py-5">
    <h2 class="mb-4">Confirm Your Payment</h2>

    <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>{{ $order->customer->name }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>BDT {{ number_format($order->final_price, 2) }}</td>
        </tr>
    </table>

    <form method="POST" action="{{ url('/pay') }}">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <input type="hidden" name="amount" value="{{ $order->final_price }}">
        <input type="hidden" name="customer_name" value="{{ $order->customer->name }}">
        <input type="hidden" name="customer_email" value="{{ $order->customer->email }}">
        <input type="hidden" name="customer_phone" value="{{ $order->customer->phone }}">
        <input type="hidden" name="customer_address" value="{{ $order->customer->address }}">
        <button type="submit" class="btn btn-success w-100">Pay Now with SSLCommerz</button>
    </form>
</div>

@endsection
