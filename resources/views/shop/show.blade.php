<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Nanoart Konveksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-black text-white p-4 flex justify-between items-center">
        <a href="/" class="font-bold text-xl">🧵 Nanoart Konveksi</a>
        <a href="/cart" class="bg-white text-black px-4 py-2 rounded-full font-bold">🛒 Keranjang</a>
    </header>

    <div class="max-w-4xl mx-auto p-4">
        <a href="/" class="text-gray-600">← Kembali ke Beranda</a>
        <div class="bg-white rounded-2xl overflow-hidden shadow mt-4 md:flex">
            <div class="md:w-1/2 h-80 bg-gray-200">
                @if(Str::endsWith($product->image, ['.jpg','.jpeg','.png','.webp']))
                    <img src="{{ asset($product->image) }}" style="width:100%; height:100%; object-fit:cover;">
                @else
                    <div class="h-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-8xl">
                        {{ $product->image }}
                    </div>
                @endif
            </div>
            <div class="md:w-1/2 p-6">
                <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
                <p class="text-gray-500 mt-2">{{ $product->description }}</p>
                <p class="mt-4">Stok: {{ $product->stock }}</p>
                <p class="text-orange-600 font-bold text-3xl mt-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <form action="/cart/add/{{ $product->id }}" method="POST" class="mt-6">
                    @csrf
                    <button class="bg-black text-white px-6 py-3 rounded-full font-bold w-full">+ Tambah ke Keranjang</button>
                </form>
                <a href="https://wa.me/6281228586468?text=Halo%20NanoArt,%20saya%20mau%20pesan%20{{ urlencode($product->name) }}" target="_blank" class="block text-center bg-green-500 text-white px-6 py-3 rounded-full font-bold w-full mt-3">💬 Order via WA</a>
            </div>
        </div>
    </div>
</body>
</html>