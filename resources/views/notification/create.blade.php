@extends('layouts.backend')
@section('page_title',"Notification Add")

@section('content')
<div class="container">
    <h2 class="mb-4">Create Notification</h2>

    <form action="{{ route('notification.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Customer ID</label>
            <input type="number" name="customer_id" class="form-control" value="{{ old('customer_id') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Order ID</label>
            <input type="number" name="order_id" class="form-control" value="{{ old('order_id') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control">{{ old('message') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">-- Select Status --</option>
                <option value="unread" {{ old('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="read" {{ old('status') == 'read' ? 'selected' : '' }}>Read</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('notification.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

