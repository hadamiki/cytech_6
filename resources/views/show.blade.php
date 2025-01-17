@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品情報詳細画面</h2>
        </div>
        
    </div>
</div>

<div style="text-align:left;">
  <div class="row">
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            {{ $product->product_name}}
        </div>
    </div>
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            @foreach ($companies as $company)
                @if($company->id == $product->companie_id){{ $company->company_name}}@endif
            
            @endforeach
            <!-- {{ $product->companie_id}} -->
        </div>
    </div>
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            {{ $product->price}}
        </div>
    </div>
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            {{ $product->stock}}
        </div>
    </div>
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            {{ $product->comment}}
        </div>
    </div>
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
            {{ $product->img_path}}
        </div>
    </div>

  </div>
    <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">変更</a>
    </div>
    <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/products') }}?page={{ $page_id }}">戻る</a>
    </div>
  
           
</div>

@endsection