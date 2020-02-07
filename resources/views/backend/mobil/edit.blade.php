@extends('layouts.backend')
@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Update Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Update Form</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <form action="/mobil/{{$mobil->mobil_id}}/update" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="form-group">
                                            <input class="form-control" type="hidden" name="id" id="id" value="{{ $mobil->mobil_id }}">
                                            <div class="form-group form-group-default">
                                                <label>Nomor Kerangka</label>
                                                <input name="mobil_no_kerangka" type="text" class="form-control" placeholder="Nomor Kerangka" value="{{$mobil->mobil_no_kerangka}}">
                                            </div><div class="form-group form-group-default">
                                                <label>No Polisi</label>
                                                <input name="mobil_no_polisi" type="text" class="form-control" placeholder="Nama Type" value="{{$mobil->mobil_no_polisi}}">
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Nama Merek</label>
                                                <select class="form-control" id="formGroupDefaultSelect" name="mobil_brand_id">
                                                    @foreach($brand AS $mb)
                                                        <option value="{{$mb->brand_id}}">{{$mb->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Nama Tipe</label>
                                                <select class="form-control" id="formGroupDefaultSelect" name="mobil_type_id">
                                                    @foreach($type AS $mt)
                                                        @if
                                                        <option value="{{$mt->type_id->type_brand_id}}">{{$mt->type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Tahun</label>
                                                <input name="mobil_tahun" type="text" class="form-control" placeholder="Tahun" value="{{$mobil->mobil_tahun}}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection