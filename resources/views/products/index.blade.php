@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/test_products.css') }}">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>商品一覧</h2>

            <!-- 検索フォーム -->
            <form method="GET" action="{{ route('products.index') }}" class="mb-3">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="検索キーワード" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <select name="manufacturer_name" class="form-control">
                            <option value="">メーカー名</option>
                            <option value="サントリー" {{ request('manufacturer_name') == 'サントリー' ? 'selected' : '' }}>サントリー</option>
                            <option value="キリン" {{ request('manufacturer_name') == 'キリン' ? 'selected' : '' }}>キリン</option>
                            <option value="アサヒ" {{ request('manufacturer_name') == 'アサヒ' ? 'selected' : '' }}>アサヒ</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th><a href="{{ route('products.create') }}" class="btn btn-link">商品新規登録</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    <tr class="{{ $index % 2 == 0 ? '' : 'odd-row' }}">
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 50; height:auto">
                            @else
                            画像なし
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>¥{{ $product->price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->manufacturer_name }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">詳細</a>
                    
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
