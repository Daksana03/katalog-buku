<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Buku</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .alert { background: #d1fae5; color: #065f46; padding: 10px; border-radius: 6px; margin-bottom: 16px; }
        .error { color: #dc2626; font-size: 14px; }
        form { background: #f8fafc; padding: 16px; border-radius: 8px; border: 1px solid #e2e8f0; }
        input { width: 100%; padding: 8px; margin: 6px 0 12px; box-sizing: border-box; }
        button { background: #2563eb; color: white; border: none; padding: 10px 16px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Katalog Buku</h1>

    @session('success')
        <div class="alert">{{ $value }}</div>
    @endsession

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <label>Judul Buku:</label>
        <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Filosofi Teras">
        @error('title') <div class="error">{{ $message }}</div> @enderror

        <label>Penulis:</label>
        <input type="text" name="author" value="{{ old('author') }}" placeholder="Contoh: Henry Manampiring">
        @error('author') <div class="error">{{ $message }}</div> @enderror

        {{-- Input Tahun Terbit (Level 2) --}}
        <label>Tahun Terbit:</label>
        <input type="number" name="year" value="{{ old('year') }}" placeholder="Contoh: 2018">
        @error('year') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">+ Tambah Buku</button>
    </form>

    <hr style="margin: 24px 0;">

    <h3>Koleksi Saat Ini:</h3>
    <ul>
        @forelse ($books as $book)
            {{-- Tampilan Tahun Terbit (Level 3) --}}
            <li><strong>{{ $book->title }}</strong> oleh {{ $book->author }} ({{ $book->year }})</li>
        @empty
            <li>Belum ada buku. Yuk tambahkan buku pertamamu!</li>
        @endforelse
    </ul>

</body>
</html>