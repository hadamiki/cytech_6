@extends('app')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">ユーザーログイン画面</h2>
        </div>
        
    </div>
</div>

<div class="row">
    
    <form action="product.postRegister" method="post">
        <table>
            @csrf
            <tr>
                <th>mail: </th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th>pass: </th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="登録"></td>
            </tr>
        </table>
    </form>

</div>
<div>
        <a class="btn btn-success" href="{{ route('product.auth') }}">戻る</a>
        </div>


@endsection