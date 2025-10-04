@extends('layouts.customer')

@section('content')
  <!-- <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="invoice-container w-100" style="max-width: 800px;">
      <div class="card shadow">
        <div class="card-body">
          <h2 class="text-center">Order Invoice</h2>
          <table>
            <tr>
              <th>Customer:</th><td>{{ $order->customer?->name }}</td>
            </tr>
            <tr>
              <th>Invoice No.:</th><td>{{ $order->id }}</td>
            </tr>
            <tr>
              <th>Order Date:</th><td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            <tr>
              <th>Shipping Address:</th>
              <td>
                {{ $order->address }}<br>
                {{ $order->district?->name }}<br>
                {{ $order->division?->name }}
              </td>
            </tr>
          </table>

          <p>Status: {{ $order->status }}</p>

          <table class="table">
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
            <tfoot>
              <tr>
                <th colspan="4" class="text-right">Total Price:</th>
                <th>{{ number_format($order->total_price, 2) }}</th>
              </tr>
              <tr>
                <th colspan="4" class="text-right">Discount Amount:</th>
                <th>{{ number_format($order->discount_amount, 2) }}</th>
              </tr>
              <tr>
                <th colspan="4" class="text-right">Final Price:</th>
                <th>{{ number_format($order->final_price, 2) }}</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
    </div>
  </div> -->


  <!-- resources/views/invoice.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice{{ $order->id }}</title>
    <style>
        /* Basic styling */
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        /* Print-specific styles */
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
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <h2>Invoice {{ $order->id }}</h2>
        <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>

        <h3>Order</h3>
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

        <!-- Print button -->
        <button class="no-print" onclick="window.print()">Print Invoice</button>
    </div>
</body>
</html>
@endsection
