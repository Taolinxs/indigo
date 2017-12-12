@extends('admin.layouts.app')

@section('content')
    <a href="{{ route('admin.settings.create') }}" class="btn btn-lg btn-primary btn-flat" style="margin-bottom: 15px;">Add New</a>

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-default">
                <div class="box-body">
                    @include('admin.settings._list')
                </div>
            </div>
        </div>
    </div>

@endsection