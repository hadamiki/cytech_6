@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品情報編集画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('product.show', $product->id) }}">戻る</a>
        </div>
        
    </div>
</div>

<div style="text-align:left;">
   <form action="{{ route('product.update',$product->id) }}" method="post">
    @method('PUT')
    @csrf

        <div class="row">
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="商品名">
                    @error('product_name')
                    <span style="color:red;">商品名を20文字以内で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <select name="companie_id"  class="form-select">
                        <option>メーカー名</option>
                        <!-- Companyテーブルのcompanie_idと紐づけする必要がある※要訂正 -->
                        @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $product->companie_id == $company->id ? 'selected' : ''}}>{{ $company->company_name}}</option>
                        
                        @endforeach
                    </select>
                    @error('company_name')
                    <span style="color:red;">メーカー名を選択してください</span>
                    @enderror
                </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="価格">
                    @error('price')
                    <span style="color:red;">価格を整数で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="在庫数">
                    @error('stock')
                    <span style="color:red;">在庫数を整数で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <textarea class="form-control" style="height:100px" name="comment"  placeholder="コメント">{{ $product->comment  }}</textarea>
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="file" name="img_path" accept="image/jpeg, image/png " class="form-control" > 
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>

        </div>
   </form>
   
</div>

@endsection