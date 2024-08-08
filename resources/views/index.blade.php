@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="text-left">
            <h2 style="font-size:1rem;">商品画面一覧</h2>
        </div>
        <div>
        <a class="btn btn-success" href="{{ route('product.create') }}">新規登録</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-1"><p>{{ $message }}</p></div>
        @endif
    </div>

</div>

<!-- ここから検索機能処理 -->
<div style="text-align:left;">
    <form action="{{ route('product.search')}}" class="form-inline my-2 my-lg-0 ml-2" method="GET">
        <div class="form-group">
            <input type="text" class="form-control mr-sm-2" name="search" value="{{ request('search')}}" placeholder="キーワードを入力">
        </div>

        <div class="form-group">
            <select name="companie_id" class="form-select">
                <option>メーカー名</option>
                        
                 @foreach ($companies as $company)
                    <option value="{{ $company->id}}">{{ $company->company_name}}</option>
                        
                @endforeach
             </select>
              
        <input type="submit" value="検索" class="btn btn-info">
    </form>

</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>商品画像</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>メーカー名</th>
    </tr>
    @foreach ($products as $product )
    <tr>
        <td style="text-align:center">{{ $product->id}}</td>
        <td style="text-align:left">{{ $product->img_path}}</td>
        <td style="text-align:center">{{ $product->product_name}}</td>
        <td style="text-align:right">{{ $product->price}}円</td>
        <td style="text-align:right">{{ $product->stock}}個</td>
        <td style="text-align:right">{{ $product->companie_id}}</td>
        
        <td style="text-align:center">
            <a class="btn btn-primary" href="{{ route('product.show', $product->id) }}?page_id={{ $page_id }}">詳細</a>
        </td>
        <td style="text-align:center">
            <form action="{{ route('product.destroy',$product->id )}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？")'>削除</button>
            </form>
        </td>
    </tr>
    
    @endforeach
</table>

    {!! $products->links('pagination::bootstrap-5') !!}
@endsection