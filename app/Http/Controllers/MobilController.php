<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Mobil;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    public function read(){

            $data['mobil'] = DB::table('mobil')
                ->join('brand', 'brand.brand_id', '=', 'mobil.mobil_brand_id')
                ->join('type', 'type.type_id', '=', 'mobil.mobil_type_id')
                ->get();

            $data['brand'] = DB::table('brand')->get();
            $data['type'] = DB::table('type')->get();

            return view('backend.mobil.index', $data);
    }

    public function create(Request $request){

        DB::table('mobil')->insert([
            'mobil_no_kerangka' => $request->mobil_no_kerangka,
            'mobil_no_polisi' => $request->mobil_no_polisi,
            'mobil_brand_id' => $request->mobil_brand_id,
            'mobil_type_id' => $request->mobil_type_id,
            'mobil_tahun' => $request->mobil_tahun
        ]);

        return redirect('/mobil');
    }

    public function edit($id){

        $data['mobil'] = DB::table('mobil')->where('mobil_id', $id)->first();

        return view('backend.mobil.edit', $data);
    }

    public function update(Request $request, $id){

        DB::table('mobil')->where('mobil_id', $id)->update(
            [
                'mobil_no_kerangka' => $request->mobil_no_kerangka,
                'mobil_no_polisi' => $request->mobil_no_polisi,
                'mobil_brand_id' => $request->mobil_brand_id,
                'mobil_type_id' => $request->mobil_type_id,
                'mobil_tahun' => $request->mobil_tahun
            ]
        );

        return redirect('/mobil');
    }

    public function delete(Request $request, $id){

        DB::table('mobil')->where('mobil_id', $id)->delete();

        return redirect('/mobil');
    }

}
