@extends('layouts.master')

@section('content')


    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="offset-3 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Campuse </strong> {{$campuse->name}}
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
                            <form action="{{route('campuses.update',$campuse->id)}}" method="post" class="">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class=" form-control-label">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter Type Name.."
                                           value="{{$campuse->name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email" class=" form-control-label">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Email.."
                                           value="{{$campuse->email}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="phone" class=" form-control-label">Phone</label>
                                    <input type="text" id="phone" name="phone" placeholder="Enter phone.."
                                           value="{{$campuse->phone}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="address" class=" form-control-label">Address</label>
                                    <input type="text" id="address" name="address" placeholder="Enter address.."
                                           value="{{$campuse->address}}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="school_id" class=" form-control-label">School</label>
                                    <select name="school_id" class="form-control">
                                        @foreach($schools as $school)
                                            <option value="{{$school->id}}" {{$campuse->school_id == $school->id ? 'selected' : ''}}>
                                                {{$school->name}}
                                            </option>
                                        @endforeach
                                    </select>
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

