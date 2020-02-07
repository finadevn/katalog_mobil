@extends('layouts.backend')
@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Mobil</h4>
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
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Mobil</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">

                                <button class="create-modal btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#create">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
														<span class="fw-mediumbold">
														Data</span>
                                                <span class="fw-light">
															Baru
														</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form class="form horizontal" action="{{ action('MobilController@create')  }}" method="post" >
                                            <div class="modal-body">
                                                {{--<p class="small">Create a new row using this form, make sure you fill them all</p>--}}
                                                {{  csrf_field() }}
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default row add">
                                                            <label class="control-label" for="mobil_no_kerangka">Nomor Kerangka</label>
                                                            <input id="mobil_no_kerangka" type="text" class="form-control" name="mobil_no_kerangka"
                                                                   placeholder="isi nomor kerangka" required>
                                                        </div>
                                                        <div class="form-group form-group-default row add">
                                                            <label class="control-label" for="mobil_no_polisi">Nomor Polisi</label>
                                                            <input id="mobil_no_polisi" type="text" class="form-control" name="mobil_no_polisi"
                                                                   placeholder="isi nomor polisi" required>
                                                        </div>
                                                        <div class="form-group form-group-default row add">
                                                            <label class="control-label" for="brand_name">Nama Merek</label>
                                                            <select class="form-control" id="mobil_brand_id" name="mobil_brand_id" required="">
                                                                <option>- Pilih Merek -</option>
                                                                @foreach($brand AS $mb)
                                                                    <option value="{{$mb->brand_id}}">{{$mb->brand_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-group-default row add">
                                                            <label class="control-label" for="brand_name">Nama Tipe</label>
                                                            <select class="form-control" id="mobil_type_id" name="mobil_type_id" required="">
                                                                <option>- Pilih Tipe -</option>
                                                                @foreach($type AS $mt)
                                                                    <option value="{{$mt->type_id}}">{{$mt->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-group-default row add">
                                                            <label class="control-label" for="mobil_tahun">Tahun</label>
                                                            <input id="mobil_tahun" type="text" class="form-control" name="mobil_tahun"
                                                                   placeholder="isi tahun" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th width="50px">No.</th>
                                        <th>Nomor Kerangka</th>
                                        <th>Nomor Polisi</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <th>Tahun</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $no=1 ?>
                                    @foreach($mobil as $key => $value)
                                        <tr class="post{{$value->mobil_id}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $value->mobil_no_kerangka }}</td>
                                            <td>{{ $value->mobil_no_polisi }}</td>
                                            <td>{{ $value->brand_name }}</td>
                                            <td>{{ $value->type_name }}</td>
                                            <td>{{ $value->mobil_tahun }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/mobil/{{$value->mobil_id}}/edit" class="edit-modal">
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/mobil/{{$value->mobil_id}}/delete" class="delete-modal">
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection