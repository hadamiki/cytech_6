@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品新規登録</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/products') }}">戻る</a>
        </div>
        
    </div>
</div>

<div style="text-align:left;">
   <form action="{{ route('product.store')}}" method="post">
    @csrf

        <div class="row">
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="product_name" class="form-control" placeholder="商品名">
                    @error('product_name')
                    <span style="color:red;">商品名を20文字以内で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <select name="companie_id" class="form-select">
                        <option>メーカー名</option>
                        
                        @foreach ($companies as $company)
                        <option value="{{ $company->id}}">{{ $company->company_name}}</option>
                        
                        @endforeach
                    </select>
                    @error('company_name')
                    <span style="color:red;">メーカー名を選択してください</span>
                    @enderror
                </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="price" class="form-control" placeholder="価格">
                    @error('price')
                    <span style="color:red;">価格を整数で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="stock" class="form-control" placeholder="在庫数">
                    @error('stock')
                    <span style="color:red;">在庫数を整数で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <textarea class="form-control" style="height:100px" name="comment" placeholder="コメント"></textarea>
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="file" name="img_path" accept="image/jpeg, image/png " class="form-control">
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>

        </div>
   </form>
   
</div>

@endsection