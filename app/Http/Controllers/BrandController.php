<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function read(){

        $brand = Brand::all();
        return view('backend.brand.index', ['brand' => $brand]);
    }

    public function create(Request $request){

        DB::table('brand')->insert([
            'brand_name' => $request->brand_name
        ]);

        return redirect('/brand');
    }

    public function edit($id){

        $data['brand'] = DB::table('brand')->where('brand_id', $id)->first();

        return view('backend.brand.edit', $data);
    }

    public function update(Request $request, $id){

        DB::table('brand')->where('brand_id', $id)->update(
            [
                'brand_name' => $request->brand_name
            ]
        );

        return redirect('/brand');
    }

    public function delete(Request $request, $id){

        DB::table('brand')->where('brand_id', $id)->delete();

        return redirect('/brand');
    }

}
