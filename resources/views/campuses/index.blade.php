@extends('layouts.master')

@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Campuses Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>School Name</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campuses as $campuse)
                                    <tr>
                                        <td>{{$campuse->id}}</td>
                                        <td>{{$campuse->name}}</td>
                                        <td>{{$campuse->email}}</td>
                                        <td>{{$campuse->phone}}</td>
                                        <td>{{$campuse->address}}</td>
                                        <td>{{$campuse->school->name}}</td>
                                        <td>{{$campuse->created_at}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{route('campuses.edit',$campuse->id)}}">
                                                    <button type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-primary btn-sm"
                                                            data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{route('campuses.destroy',$campuse->id)}}"
                                                   class="delete-confirm">
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



    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            console.log(url);
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanently deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                    swal({
                        title: 'Permanently Deleted',
                        text: 'This record was permanently deleted!',
                        icon: 'success',
                        buttons: "Close",
                    })
                } else {
                    swal({
                        title: 'The deletion process has been canceled',
                        text: 'This record was NOT deleted!',
                        icon: 'info',
                        buttons: "Close",

                    })
                }
            });
        });
    </script>
@endsection

