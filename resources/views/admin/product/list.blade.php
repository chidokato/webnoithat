@extends('admin.layout.index')
@section('product') menu-item-active @endsection
@section('content')
@include('admin.errors.alerts')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 mb-0 text-gray-800">List Category</h1> -->
    <form style="display: flex;" action="admin/news/loc" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <select style="width: 100px;" class="form-control mr-3" name="paginate">
            <option <?php if(isset($paginate) && $paginate=='50'){echo "selected";} ?> value="50">50</option>
            <option <?php if(isset($paginate) && $paginate=='100'){echo "selected";} ?> value="100">100</option>
            <option <?php if(isset($paginate) && $paginate=='200'){echo "selected";} ?> value="200">200</option>
        </select>
        <div class="input-group">
            <input value="{{ isset($key) ? $key : '' }}" name="name" type="text" class="form-control bg-light small" placeholder="Search for...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <a href="admin/product/add"><button class="btn-primary" type="button"><i class="far fa-file"></i> Thêm mới</button></a>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <input onclick="toggle(this);" type="checkbox" value="" id="checkbox">
                            </th>
                            <th></th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $val)
                        <tr>
                            <td class="pt24px">
                                <input type="checkbox" value="{{$val->id}}">
                            </td>
                            <td>
                                {!! isset($val->img) ? '<img style="width: 48px; height: 48px; object-fit: cover;" src="data/product/80/'.$val->img.'" class="thumbnail-img align-self-center" alt="" />' : '' !!}
                            </td>
                            <td class="pt24px">
                                {{$val->name}}
                            </td>
                            <td class="pt24px">{{ isset($val->category->name) ? $val->category->name : '' }}</td>
                            <td class="pt24px">{{ isset($val->user->name) ? $val->user->name : '' }}</td>
                            <td>
                                {{date('d/m/Y',strtotime($val->updated_at))}} <br> <i style="font-size: 14px">{{date('d/m/Y',strtotime($val->created_at))}}</i>
                            </td>
                            <td class="pt24px">
                                <input type="checkbox" <?php if($val->status == 'true'){echo "checked";} ?> >
                            </td>
                            <td class="d-flex pt24px">
                                <a href="admin/product/double/{{$val->id}}" class="mr-2"><i class="far fa-copy"></i></a>
                                <a href="admin/product/edit/{{$val->id}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                <a href="admin/product/delete/{{$val->id}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection