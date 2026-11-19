<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanoart Konveksi - Toko Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-black text-white p-4 flex justify-between items-center">
        <h1 class="font-bold text-xl">🧵 Nanoart Konveksi</h1>
        <a href="/cart" class="bg-white text-black px-4 py-2 rounded-full font-bold">🛒 Keranjang</a>
    </header>
    <div class="max-w-6xl mx-auto p-4">
        <h2 class="text-3xl font-bold">Selamat Datang di Nanoart Konveksi!</h2>
        <p class="text-gray-600 mt-1">Produk terbaik, harga bersahabat.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl overflow-hidden shadow">
                <div class="h-48 overflow-hidden bg-gray-200">
                    @if(Str::endsWith($product->image, ['.jpg','.jpeg','.png','.webp']))
                        <img src="{{ asset($product->image) }}" style="width:100%; height:100%; object-fit:cover;">
                    @else
                        <div class="h-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-6xl">{{ $product->image }}</div>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mt-1">{{ $product->description }}</p>
                    <p class="text-sm mt-3">Stok: {{ $product->stock }}</p>
                    <div class="flex justify-between items-center mt-3">
                        <span class="text-orange-600 font-bold text-xl">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="/product/{{ $product->id }}" class="bg-black text-white px-4 py-2 rounded-full text-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a href="https://wa.me/6281228586468" target="_blank" style="position:fixed; bottom:20px; right:20px; background:#25D366; color:white; padding:15px 20px; border-radius:50px; font-weight:bold; text-decoration:none;">💬 Chat WA</a>
</body>
</html>