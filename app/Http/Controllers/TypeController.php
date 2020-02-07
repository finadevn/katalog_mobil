<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function read(){

//        $type = Type::all();
        $data['type'] = DB::table('type')
            ->join('brand', 'brand.brand_id', '=', 'type.type_brand_id')
            ->get();

        $data['brand'] = DB::table('brand')->get();

        return view('backend.type.index', $data);
    }

    public function create(Request $request){

        DB::table('type')->insert([
            'type_brand_id' => $request->type_brand_id,
            'type_name' => $request->type_name
        ]);

        return redirect('/type');
    }

    public function edit($id){

        $data['type'] = DB::table('type')->where('type_id', $id)->first();
        $data['brand'] = DB::table('brand')->get();

        return view('backend.type.edit', $data);
    }

    public function update(Request $request, $id){

        DB::table('type')->where('type_id', $id)->update(
            [
                'type_brand_id' => $request->type_brand_id,
                'type_name' => $request->type_name,
            ]
        );

        return redirect('/type');
    }

    public function delete(Request $request, $id){

        DB::table('type')->where('type_id', $id)->delete();

        return redirect('/type');
    }

}
