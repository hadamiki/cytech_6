<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Companyテーブルと紐づけした際にSQL文の書き換えが必要。
        //$products = Product::latest()->paginate(5);


        $companies = Company::all();
        $products = Product::select([
            'p.id',
            'p.img_path',
            'p.product_name',
            'p.price',
            'p.stock',
            'c.company_name as companie_id',
        ])
        ->from('products as p')
        ->join('companies as c',function($join){
            $join->on('p.companie_id','=','c.id');
        })
        ->orderBy('p.id','DESC')
        ->paginate(5);

        // //検索のクエリ
        // $query = Product::query();

        // if($search = $request->search){
        //     $query->where('product_name', 'LIKE', "%{$search}%");
        // }

        // if($searchCompany = $request->$products){
        //     $query->where('companie_id', $searchCompany);

        // }

        // $results = $query->paginate(5);

        return view('index',compact('products'))
            ->with('companies', $companies)
            ->with('page_id',request()->page)
            ->with('i',(request()->input('page', 1) - 1) * 5);
            // ->with('results', ['results' => $results]);

        
    
    }

    // public function index(Request $request){
    //     $query = Product::query();

    //     if($search = $request->search){
    //         $query->where('product_name', 'LIKE', "%{$search}%");
    //     }
    //     return view('products.index', ['product' => $products]);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function search(Request $request){
        
         $query = Product::query();

        if($search = $request->search){
            $query->where('product_name', 'LIKE', "%{$search}%");
        }

        if($searchCompany = $request->companie_id){
            $query->where('companie_id', $searchCompany);
            

        }

        $results = $query->paginate(5);

        return view('search', ['results' => $results]);


     }
    public function create()
    {   
        $companies = Company::all();
        return view('create')
            ->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:20',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'required|max:100',
        ]);

        $product = new Product;
        $product->product_name = $request->input(["product_name"]);
        //Companyテーブルと紐づけする必要がある。※要訂正
        $product->companie_id = $request->input(["companie_id"]);
        $product->price = $request->input(["price"]);
        $product->stock = $request->input(["stock"]);
        $product->comment = $request->input(["comment"]);
        $product->img_path = $request->input(["img_path"]);
        $product->save();

        return redirect()->route('product.index')->with('success','商品を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $companies = Company::all();
        return view('show',compact('product'))
        ->with('page_id', request()->page_id)
        ->with('companies', $companies);
         
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::all();
        return view('edit',compact('product'))
            ->with('companies',$companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|max:20',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'required|max:100',
        ]);

        $product->product_name = $request->input(["product_name"]);
        //Companyテーブルと紐づけする必要がある。※要訂正
        $product->companie_id = $request->input(["companie_id"]);
        $product->price = $request->input(["price"]);
        $product->stock = $request->input(["stock"]);
        $product->comment = $request->input(["comment"]);
        $product->img_path = $request->input(["img_path"]);
        $product->save();

        return redirect()->route('product.index')->with('success','商品更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
                        ->with('success', $product->product_name."を削除しました");
    }

    public function getAuth(){

        $param =['message' => 'ログインしてください'];
        return view('auth', $param);
    }

    public function postAuth(Request $request){

        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'ログインしました。('. Auth::user()->name .')';
        }else{
            $msg = 'ログイン失敗しました。';
        }
        return view('auth', ['message' => $msg]);
    }

    public function getRegister(){

        return view('register');
    }

    public function postRegister(Request $request){
        $user = User::query()->create([
            'email'=>$request['email'],
            'password'=>Hash::make($request['password'])
        ]);
        Auth::login($user);

        return redirect()->route('product.auth')->with('success','登録しました');

    }


    
}
