@extends('layouts.customer')

{{-- Hide footer in this invoice page --}}
@section('footer')
    {{-- no footer --}}
@overwrite

@section('title', 'Order Invoice #' . $order->id)

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice #SL={{ $order->id }}</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f4f4f4;
    }
    .invoice-container {
      width: 100%;
      max-width: 800px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2, h3 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      padding: 8px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    @media print {
      body {
        background-color: #fff;
        margin: 0;
        padding: 0;
        display: block;
      }
      .invoice-container {
        box-shadow: none;
        border: none;
        padding: 0;
      }
      .no-print {
        display: none !important;
      }
      header, .site-footer {
        display: none !important;
      }
    }
  </style>
</head>
<body>
  <div class="invoice-container">
    <h2>Invoice #SL={{ $order->id }}</h2>
    <p><strong>Customer:</strong> {{ $order->customer?->name }}</p>
    <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <h3>Items</h3>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($order->items as $d)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->product?->name }}</td>
            <td>{{ $d->quantity }}</td>
            <td>{{ number_format($d->unit_price, 2) }}</td>
            <td>{{ number_format($d->line_total, 2) }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="5">No items found</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <h3>Summary</h3>
    <p><strong>Total Price:</strong> {{ number_format($order->total_price, 2) }}</p>
    <p><strong>Discount Amount:</strong> {{ number_format($order->discount_amount, 2) }}</p>
    <p><strong>Final Price:</strong> {{ number_format($order->final_price, 2) }}</p>

    <div style="text-align: center;">
      <button class="no-print btn btn-primary" onclick="window.print()">Print Invoice</button>
    </div>
  </div>
</body>
</html>
@endsection
