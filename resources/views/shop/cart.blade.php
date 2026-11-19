<!DOCTYPE html>
<html>
<head>
    <title>Keranjang - Nanoart Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-black text-white p-4 flex justify-between">
        <a href="/" class="font-bold text-xl">🛍️ Nanoart Konveksi</a>
        <a href="/" class="bg-white text-black px-4 py-1 rounded-full font-bold">Belanja Lagi</a>
    </nav>
    <div class="max-w-3xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">🛒 Keranjang Belanja</h1>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if(count($cart) == 0)
            <div class="bg-white p-6 rounded-2xl shadow text-center">Keranjang masih kosong. <a href="/" class="text-blue-600 underline">Belanja dulu yuk!</a></div>
        @else
            <div class="bg-white rounded-2xl shadow p-4 mb-4">
                @foreach($cart as $id => $item)
                <div class="flex justify-between border-b py-3">
                    <div>
                        <p class="font-bold">{{ $item['name'] }}</p>
                        <p class="text-sm text-gray-500">Rp {{ number_format($item['price'], 0, ',', '.') }} x {{ $item['qty'] }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-bold">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                        <a href="/cart/remove/{{ $id }}" class="text-red-500 text-sm">Hapus</a>
                    </div>
                </div>
                @endforeach
                <p class="text-right font-bold text-xl mt-4">Total: Rp {{ number_format($total, 0, ',', '.') }}</p>
            </div>
            <form action="/checkout" method="POST" class="bg-white rounded-2xl shadow p-4 space-y-3">
                @csrf
                <h2 class="font-bold text-lg">Data Pembeli</h2>
                <input name="customer_name" required placeholder="Nama Lengkap" class="w-full border rounded px-3 py-2">
                <input name="customer_phone" required placeholder="No. WhatsApp" class="w-full border rounded px-3 py-2">
                <textarea name="customer_address" required placeholder="Alamat Lengkap" class="w-full border rounded px-3 py-2"></textarea>
                <button class="w-full bg-green-600 text-white py-3 rounded-full font-bold">✅ Checkout - Bayar Rp {{ number_format($total, 0, ',', '.') }}</button>
            </form>
        @endif
    </div>
</body>
</html>