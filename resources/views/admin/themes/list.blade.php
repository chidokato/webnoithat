@extends('admin.layout.index')
@section('themes') menu-item-active @endsection
@section('content')
@include('admin.errors.alerts')
<form action="admin/themes/edit" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="text-right mb-3">
    <button type="reset" class="btn-warning mr-2"><i class="fas fa-arrow-left"></i> Back</button>
    <button type="reset" class="btn-danger mr-2"><i class="fas fa-sync"></i> Reset</button>
    <button type="submit" class="btn-success"><i class="far fa-save"></i> Save</button>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Logo</h6>
                <!-- <div class="dropdown no-arrow"><a href="admin/themes/add/logo">Thêm mới</a></div> -->
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($logo as $val)
                    <div class="col-md-6">
                        <div class="themes">
                            <img src="data/themes/{{isset($val->img)?$val->img:'no_image.jpg'}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="id[]" value="{{ $val->id }}" />
                                <input type="hidden" name="content[]" value="{{ $val->id }}" />
                                <input value="{{ $val->name }}" name="name[]" placeholder="name" type="text" class="form-control">
                                <div class="iteamaction">
                                    <input value="{{ $val->img }}" name="img[]" type="file">
                                    <!-- <a href="admin/themes/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">slider</h6>
                <div class="dropdown no-arrow"><a href="admin/themes/add/slider">Thêm mới</a></div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($slider as $val)
                    <div class="col-md-6">
                        <div class="themes">
                            <img src="data/themes/{{isset($val->img)?$val->img:'no_image.jpg'}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="id[]" value="{{ $val->id }}" />
                                <input type="hidden" name="content[]" value="{{ $val->id }}" />
                                <input value="{{ $val->name }}" name="name[]" placeholder="name" type="text" class="form-control">
                                <div class="iteamaction">
                                    <input value="{{ $val->img }}" name="img[]" type="file">
                                    <a href="admin/themes/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">title</h6>
                <!-- <div class="dropdown no-arrow"><a href="admin/themes/add/title">Thêm mới</a></div> -->
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($title as $val)
                    <div class="col-md-6">
                        <div class="themes">
                            <img src="data/themes/{{isset($val->img)?$val->img:'no_image.jpg'}}">
                            <div class="form-group">
                                <label>Name ({{ $val->id }})</label>
                                <input type="hidden" name="id[]" value="{{ $val->id }}" />
                                <input value="{{ $val->name }}" name="name[]" placeholder="name" type="text" class="form-control">
                                <div class="iteamaction">
                                    <input value="{{ $val->img }}" name="img[]" type="file">
                                    <!-- <a href="admin/themes/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a> -->
                                </div>
                                <textarea rows="5" type="text" name="content[]" class="form-control">{!! $val->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">banner</h6>
                <div class="dropdown no-arrow"><a href="admin/themes/add/banner">Thêm mới</a></div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($banner as $val)
                    <div class="col-md-6">
                        <div class="themes">
                            <img src="data/themes/{{isset($val->img)?$val->img:'no_image.jpg'}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="id[]" value="{{ $val->id }}" />
                                <input type="hidden" name="content[]" value="{{ $val->id }}" />
                                <input value="{{ $val->name }}" name="name[]" placeholder="name" type="text" class="form-control">
                                <div class="iteamaction">
                                    <input value="{{ $val->img }}" name="img[]" type="file">
                                    <a href="admin/themes/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



    </div>
    
</div>
</form>
<style type="text/css">
    .themes{display: flex; box-shadow: 0 5px 10px 0; padding: 10px; margin-bottom: 20px}
    .themes img{height: 100px; margin-right: 10px; box-shadow: 0 1px 2px 0}
    .themes .form-group{width: 100%}
    .iteamaction{display: flex; margin-top: 10px; justify-content: space-between;align-items: center; margin-bottom: 10px}
</style>
@endsection