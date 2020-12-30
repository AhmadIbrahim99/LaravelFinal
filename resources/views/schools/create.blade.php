@extends('layouts.master')

@section('content')


    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="offset-3 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Add New </strong> School
                        </div>
                        <div class="card-body card-block">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('schools.store')}}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group"><label for="name" class=" form-control-label">Name</label><input
                                        type="text" id="name" name="name" placeholder="Enter Type Name.."
                                        class="form-control">
                                </div>

                                <div class="form-group"><label for="email" class=" form-control-label">Email Address</label><input
                                        type="email" id="email" name="email" placeholder="Enter Email.."
                                        class="form-control">
                                </div>

                                <div class="form-group"><label for="website" class=" form-control-label">Website URL</label><input
                                        type="text" id="website" name="website" placeholder="Enter website.."
                                        class="form-control">
                                </div>

                                <div class="form-group"><label for="logo" class=" form-control-label">Logo</label><input
                                        type="file" id="logo" name="logo" class="form-control">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

@endsection

