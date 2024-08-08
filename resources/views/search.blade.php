@extends('app')

@section('content')

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>商品画像</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>メーカー名</th>
    </tr>
    @foreach ($results as $result )
    <tr>
        <td style="text-align:center">{{ $result->id}}</td>
        <td style="text-align:left">{{ $result->img_path}}</td>
        <td style="text-align:center">{{ $result->product_name}}</td>
        <td style="text-align:right">{{ $result->price}}円</td>
        <td style="text-align:right">{{ $result->stock}}個</td>
        <td style="text-align:right">{{ $result->companie_id }}</td>
        
           </tr>
    
    @endforeach
</table>

<div class="pull-right">
            <a class="btn btn-success" href="{{ url('/products') }}">戻る</a>
    </div>

    @endsection