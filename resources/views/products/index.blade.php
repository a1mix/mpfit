@extends('layouts.app')

@section('content')
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}">Добавить товар</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> ({{ $product->category->name }})
                <p>Цена: {{ $product->price }} руб.</p>
                <a href="{{ route('products.show', $product) }}">Подробнее</a>
                <a href="{{ route('products.edit', $product) }}">Редактировать</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
