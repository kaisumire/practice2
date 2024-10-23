@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/test_create.css') }}">
<div class="container">
    <h1>商品編集</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">商品名</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="manufacturer" class="form-label">メーカー名</label>
            <select name="manufacturer_name" class="form-control @error('manufacturer_name') is-invalid @enderror">
                <option value="">メーカーを選択してください</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->name }}" {{ old('manufacturer_name', $product->manufacturer_name) == $company->name ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            @error('manufacturer_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">価格</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock_quantity" class="form-label">在庫数</label>
            <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
            @error('stock_quantity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">商品画像</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            @if ($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 100px; height:auto; margin-top: 10px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="detail_display" class="form-label">コメント</label>
            <input type="text" class="form-control @error('detail_display') is-invalid @enderror" id="detail_display" name="detail_display" value="{{ old('detail_display', $product->detail_display) }}">
            @error('detail_display')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
