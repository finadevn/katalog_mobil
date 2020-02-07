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
                                    <form action="/type/{{$type->type_id}}/update" method="post">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="form-group">
                                            <input class="form-control" type="hidden" name="id" id="id" value="{{ $type->type_id }}">
                                            <div class="form-group form-group-default">
                                                <label>Nama Merek</label>
                                                <select class="form-control" id="formGroupDefaultSelect" name="type_brand_id">
                                                    @foreach($brand AS $tb)
                                                        <option value="{{$tb->brand_id}}">{{$tb->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group form-group-default">
                                            <label>Nama Type</label>
                                            <input name="type_name" type="text" class="form-control" placeholder="Nama Type" value="{{$type->type_name}}">
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