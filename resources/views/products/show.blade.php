@extends('layouts.app')

@section('content')
    <h1>Подробности товара</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Категория:</strong> {{ $product->category->name }}</p>
            <p class="card-text"><strong>Описание:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Цена:</strong> {{ $product->price }} руб.</p>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
@endsection
