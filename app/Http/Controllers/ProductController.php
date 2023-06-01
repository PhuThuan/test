<?php

namespace App\Http\Controllers;

use App\Http\Requests\productResquest;
use App\Models\productModel;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = productModel::all();
        return view('sanpham', compact('product'));
    }
    public function add()
    {
        return view('sanphampost');
    }
    static  function check( $imageName)
    {
        $ad = 0;
        if (file_exists('img/' . $imageName)) {
            for ($i = 0; $i < strlen($imageName); $i++) {
                if ($imageName[$i] == '.') {
                    $ad = $i;
                }
            }
            $imageName2 = ' Copy';
            $imageName =    substr_replace($imageName,    $imageName2, $ad, 0);
            return  self::check($imageName);
        }
        return  $imageName;
    }
    public function post(productResquest $request)
    {

        $path = public_path('img/');
        $imageName = $request->image->getClientOriginalName();
        $imageName = $this->check($imageName);

        $request->image->move($path, $imageName);
        $product = new productModel();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image =  $imageName;
        $res = $product->save();
        if ($res) {
            return back()->with('success', 'Đăng ký thành công');
        } else {
            return back()->with('fail', 'Đăng ký không thành công');
        }
    }
    public function delete($id)
    {
        $a =   productModel::select('image')->where('id', $id)->first();

            unlink(public_path('img/' . $a->image));
            // unlink(public_path('img/1.jpg'));// xóa ảnh khỏi file 
        
        productModel::where('id', $id)->delete();
        $product = productModel::get();
        return back()->with(compact('product'));
    }
}
