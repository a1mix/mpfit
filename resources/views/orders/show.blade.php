@extends('layouts.app')

@section('content')
    <h1>Подробности заказа #{{ $order->id }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Покупатель:</strong> {{ $order->customer_name }}</p>
            <p><strong>Товар:</strong> {{ $order->product->name }} ({{ $order->product->price }} руб.)</p>
            <p><strong>Количество:</strong> {{ $order->quantity }}</p>
            <p><strong>Итоговая цена:</strong> {{ $order->total_price }} руб.</p>
            <p><strong>Статус:</strong> {{ $order->status }}</p>
            <p><strong>Комментарий:</strong> {{ $order->comment }}</p>

            @if ($order->status == 'new')
                <form action="{{ route('orders.update-status', $order) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Отметить как выполненный</button>
                </form>
            @endif

            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
@endsection
