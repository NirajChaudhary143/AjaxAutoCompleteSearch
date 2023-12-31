<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AjaxSearch(Request $request){
        if($request->ajax()){
            $data = Product::where('name','LIKE',"$request->name%")->get();
            $output = '';
            if(count($data) > 0){
                $output = '<ul class="list-group" style="display:block; position: absolute; z-index:2" >';
                foreach($data as $row){
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
                $output .= '</ul>';
            }
            else{
                $output .= '<li class="list-group-item" >No Data Found </li>';
            }
            return $output;
        }
        $search = $request['search'] ?? "";
        if($search){
            $products = Product::where('name','LIKE',"$search%")->get();
        }
        else{

            $products = Product::all();
        }
        
        return view('product',compact('products','search'));
    }
}
