@extends('layouts.master')

@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Types Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($types as $type)
                                        <tr>
                                            <td>{{$type->id}}</td>
                                            <td>{{$type->name}}</td>
                                            <td>{{$type->created_at}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('types.edit',$type->id)}}">
                                                        <button type="button" data-toggle="tooltip" title=""
                                                                class="btn btn-primary btn-sm"
                                                                data-original-title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('types.destroy',$type->id)}}" class="delete-confirm">
                                                        <button type="button" data-toggle="tooltip" title="Delete "
                                                                class="btn btn-danger btn-sm"
                                                                data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
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
        </div><!-- .animated -->
    </div><!-- .content -->


@endsection

