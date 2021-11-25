@extends('template')
@section('page_title')
    @lang('messages.messages.messages')
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-black">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#messages').addClass('active');
        $('#messages_index').addClass('active');
    </script>
@stop
