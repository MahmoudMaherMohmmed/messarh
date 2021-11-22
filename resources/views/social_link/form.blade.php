@extends('template')
@section('page_title')
@lang('messages.social_links.create_social_link')
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('messages.social_links.create_social_link') </h3>
                </div>
                <div class="box-content">
                    @if($social_link)
                    {!! Form::model($social_link,["url"=>"social_link/$social_link->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]) !!}
                    @include('social_link.input',['buttonAction'=>''.\Lang::get("messages.Edit").'','required'=>'  (optional)'])
                    @else
                    {!! Form::open(["url"=>"social_link","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                    @include('social_link.input',['buttonAction'=>''.\Lang::get("messages.save").'','required'=>'  *'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>
        $('#social_link').addClass('active');
        $('#social_link_create').addClass('active');
    </script>
@stop
