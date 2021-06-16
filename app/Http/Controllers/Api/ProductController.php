<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Product::latest()->get();

        $Product = new Product;
        if(!empty($request->search)) {
            $search = $request->search;
            $Product = $Product->where(function($query) use($search){
                            $query->where('name','LIKE',"%$search%")
                                ->orWhere('quality','LIKE',"%$search%")
                                ->orWhere('quantity','LIKE',"%$search%")
                                ->orWhere('price','LIKE',"%$search%");
                            });
        }
        $product = Product::latest()->paginate(2);
        return $Product->latest()->get();
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        //
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'Name'=>'required',
            'Quality'=>'required',
            'Quantity'=>'required',
            'Price'=>'required'
        ],
        [
            'Name.required'=>'The Product Name is required!!',
            'Quality.required'=>'The Product Quality is required!!',
            'Quantity.required'=>'The Product Quantity is required!!',
            'Price.required'=>'The Product Price is required!!',
        ]
    );
        Product::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
        //
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        return Product::latest()->get();
    }
    public function productDetails(Request $request)
    {
        $detail=Product::where(['products.id'=> $request->id])->get();
        return view('details')->with(['details'=>$detail]);
    }

    public function show1()
    {
        $data= Member::pagination(2);
        dd($data);
        return view('/',['members'=>$data]);
    }
}
