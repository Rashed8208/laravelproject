@extends('layouts.backend')
@section('page_title',"Notification Add")

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Notification</h2>

    <form action="{{ route('notification.update', $notification->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Customer ID</label>
            <input type="number" name="customer_id" value="{{ old('customer_id', $notification->customer_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Order ID</label>
            <input type="number" name="order_id" value="{{ old('order_id', $notification->order_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control">{{ old('message', $notification->message) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">-- Select Status --</option>
                <option value="unread" {{ $notification->status == 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="read" {{ $notification->status == 'read' ? 'selected' : '' }}>Read</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('notification.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

