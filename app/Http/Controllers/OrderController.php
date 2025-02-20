<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        $totalPrice = $product->price * $request->quantity;

        Order::create([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'new', // Статус по умолчанию
            'comment' => $request->comment,
        ]);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан.');
    }

    public function update(Request $request, Order $order)
    {
        // Валидация данных
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:new,completed',
            'comment' => 'nullable|string',
        ]);

        // Получаем товар
        $product = Product::findOrFail($request->product_id);

        // Рассчитываем итоговую цену
        $totalPrice = $product->price * $request->quantity;

        // Обновляем заказ
        $order->update([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function edit(Order $order)
    {
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        if ($order->status == 'new') {
            $order->update(['status' => 'completed']);
            return redirect()->route('orders.show', $order)->with('success', 'Статус заказа обновлен на "выполнен".');
        }

        return redirect()->route('orders.show', $order)->with('error', 'Нельзя изменить статус заказа.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
