@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/test_create.css') }}">

<div class="container">
    <h1>商品詳細</h1>

    <form>
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <p class="form-control">{{ $index + 1 }}</p>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">商品画像</label>
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 200px; height:auto">
            @else
                <p class="form-control">画像なし</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">商品名</label>
            <p class="form-control">{{ $product->name }}</p>
        </div>

        <div class="mb-3">
            <label for="manufacturer_name" class="form-label">メーカー名</label>
            <p class="form-control">{{ $product->manufacturer_name }}</p>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">価格</label>
            <p class="form-control">¥{{ $product->price }}</p>
        </div>

        <div class="mb-3">
            <label for="stock_quantity" class="form-label">在庫数</label>
            <p class="form-control">{{ $product->stock_quantity }}</p>
        </div>

        <div class="mb-3">
            <label for="detail_display" class="form-label">コメント</label>
            <p class="form-control">{{ $product->detail_display }}</p>
        </div>

        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">編集</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
