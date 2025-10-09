@extends('layouts.master')
@section('content')

<div class="container py-5 text-center">
    <h2 class="text-danger mb-3">Payment Failed!</h2>
    <p>Unfortunately, your payment could not be processed.</p>
    <p>Please try again or contact support.</p>
    <a href="{{ route('checkout') }}" class="btn btn-warning mt-3">Try Again</a>
</div>

@endsection
