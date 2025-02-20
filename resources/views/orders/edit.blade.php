@extends('layouts.app')

@section('content')
    <h1>Редактировать заказ</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_name" class="form-label">ФИО покупателя</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Товар</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->price }} руб.)
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order->quantity }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select name="status" id="status" class="form-control" required>
                <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea name="comment" id="comment" class="form-control">{{ $order->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Обновить заказ</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к списку</a>
    </form>
@endsection
