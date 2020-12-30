@extends('layouts.master')

@section('content')


    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="offset-3 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Add New </strong> Course
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
                            <form action="{{route('courses.store')}}" method="post" class="">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class=" form-control-label">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter Type Name.."
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="price" class=" form-control-label">Price</label>
                                    <input type="text" id="price" name="price" placeholder="Enter price.."
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="campuse_id" class="form-control-label">Campus Name</label>
                                    <select name="campuse_id" class="form-control">
                                        @foreach($campuses as $campus)
                                            <option value="{{$campus->id}}">{{$campus->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Multi Select Type</strong>
                                    </div>
                                    <div class="card-body">
                                        <select name="type_ids[]" data-placeholder="Choose a type..." multiple
                                                class="standardSelect">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
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

