<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Brand;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobilApiController extends Controller
{
    public function read($brand = null, $type = null){

        $data = Mobil::select();

        if($brand != null OR $brand != ''){

            $brand = Brand::where(['brand_name'=>$brand])->first();
            $data->where('mobil_brand_id',$brand['brand_id']);

        }

        if($type != null OR $type != ''){

            $type = Type::where(['type_name'=>$type])->first();
            $data->where('mobil_type_id',$type['type_id']);

        }

        return response()->json($data->with('brand','type')->get(),200);
    }

    public function create(Request $request, $brand = null, $type = null){

        $data = new Mobil;
        $validators = Validator::make($request->all(), $data->rules);

        if($validators->fails()){
            return response()->json(['validators' => $validators->getMessageBag()]);
        } else {

            $data->mobil_no_kerangka = $request->get('mobil_no_kerangka');
            $data->mobil_no_polisi = $request->get('mobil_no_polisi');

            if ($brand != null OR $brand != '') {

                $brand = Brand::where(['brand_name' => $brand])->first();
                $data->mobil_brand_id = $brand['brand_id'];

            }

            if ($type != null OR $type != '') {

                $type = Type::where(['type_name' => $type])->first();
                $data->mobil_type_id = $type['type_id'];

            }

            $data->mobil_tahun = $request->get('mobil_tahun');

            $data->save();

            return response()->json($data,200);
        }
    }

    public function update(Request $request, $brand = null, $type = null, $id = null){

       $data = Mobil::find($id);
        $validators = Validator::make($request->all(), $data->rules);

        if($validators->fails()){
            return response()->json(['validators' => $validators->getMessageBag()]);
        } else {

            $data->mobil_no_kerangka = $request->get('mobil_no_kerangka');
            $data->mobil_no_polisi = $request->get('mobil_no_polisi');

            if ($brand != null OR $brand != '') {

                $brand = Brand::where(['brand_name' => $brand])->first();
                $data->mobil_brand_id = $brand['brand_id'];

            }

            if ($type != null OR $type != '') {

                $type = Type::where(['type_name' => $type])->first();
                $data->mobil_type_id = $type['type_id'];

            }

            $data->mobil_tahun = $request->get('mobil_tahun');

            $data->update();

            return response()->json($data,200);
        }
    }

    public function delete($brand = null, $type = null, $id){

        $data = Mobil::select();

        if($brand != null OR $brand != ''){

            $brand = Brand::where(['brand_name'=>$brand])->first();
            $data->where('mobil_brand_id',$brand['brand_id']);

        }

        if($type != null OR $type != ''){

            $type = Type::where(['type_name'=>$type])->first();
            $data->where('mobil_type_id',$type['type_id']);

        }

        $data->where('mobil_id',$id)->delete();

        return response()->json('berhasil dihapus');
    }

}
