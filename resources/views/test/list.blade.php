@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <a href="{{route('tests.create',$category->id)}}" class="btn btn-link">Thêm mới</a>
                <div class="row">
                    @foreach($tests as $test)
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$test->name}}</h5>
                            <p class="card-text">{{$test->desc}}</p>
                            <a href="{{route('tests.delete',$test->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('tests.edit',$test->id)}}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection
