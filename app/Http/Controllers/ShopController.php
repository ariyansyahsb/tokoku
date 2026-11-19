<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $qty = (int) $request->input('qty', 1);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $qty;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $qty,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Produk ditambah ke keranjang!');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return view('shop.cart', compact('cart', 'total'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index');
        }

        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
        ]);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
            $product = Product::find($productId);
            if ($product) {
                $product->decrement('stock', $item['qty']);
            }
        }

        session()->forget('cart');
        return redirect()->route('shop.index')->with('success', 'Pesanan berhasil! Total: Rp ' . number_format($total, 0, ',', '.'));
    }
}