@extends('layouts.backend')
@section('content')
  <div class="container">
    <h2>Payment Successful</h2>
    <p>Your order #{{ session('order_id') ?? '' }} was paid successfully.</p>
  </div>
@endsection
