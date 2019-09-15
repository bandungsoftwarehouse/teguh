<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class ModelController extends Controller
{
	public function __construct()
	{
	    return $this->middleware('paid');
        }
	public function show($id,Request $request)
	{
                //$file = Menu::where('class','product')->get();
		$products = $request->get('products');
		foreach ($products as $product) {
		    \Log::info('id:'.$product->id);
		}
		$i = $products->where('id',$id)->first();
//		dd($products->where('id',$id));
		if(!$i){
		    return view('errors.404');
		}
                $file = Menu::find($i->detail_id);
		return render('model')->with('file',$file);
	}
}
