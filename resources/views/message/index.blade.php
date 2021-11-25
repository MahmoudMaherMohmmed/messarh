@extends('template')
@section('page_title')
    @lang('messages.messages.messages')
@stop

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

<style>
    body {
    background-color: #74EBD5;
    background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);

    min-height: 100vh;
    }

    ::-webkit-scrollbar {
    width: 5px;
    }

    ::-webkit-scrollbar-track {
    width: 5px;
    background: #f5f5f5;
    }

    ::-webkit-scrollbar-thumb {
    width: 1em;
    background-color: #ddd;
    outline: 1px solid slategrey;
    border-radius: 1rem;
    }

    .text-small {
    font-size: 0.9rem;
    }

    .messages-box,
    .chat-box {
    height: 500px;
    overflow-y: scroll;
    }

    .rounded-lg {
    border-radius: 0.5rem;
    }

    input::placeholder {
    font-size: 0.9rem;
    color: #999;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-black">
                    
                        <div class="container py-5 px-4">
                            <div class="row rounded-lg overflow-hidden shadow">
                                <!-- Users box-->
                                <div class="col-5 px-0">
                                <div class="bg-white">

                                    <div class="bg-gray px-4 py-2 bg-light">
                                    <p class="h5 mb-0 py-1">Recent</p>
                                    </div>

                                    <div class="messages-box">
                                        <div class="list-group rounded-0" id="clients_list">
                                            @if(isset($clients) && $clients!=null && count($clients)>0)
                                            @foreach($clients as $client)
                                                <a onClick="clientMessages({{$client['client_id']}})" id="client_{{$client['client_id']}}" class="list-group-item list-group-item-action rounded-0">
                                                    <div class="media"><img src="{{$client['client_image']}}" alt="user" width="50" class="rounded-circle">
                                                        <div class="media-body ml-4">
                                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                                            <h6 class="mb-0">{{$client['client_name']}}</h6><small class="small font-weight-bold">{{$client['date']}}</small>
                                                        </div>
                                                        <p class="font-italic mb-0 text-small">{{$client['message']}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Chat Box-->
                                <div class="col-7 px-0">
                                <div class="px-4 py-5 chat-box bg-white" id="client_messages">
                                
                                </div>

                                <!-- Typing area -->
                                <form action="#" class="bg-light" id="message_form" style="padding-bottom: 6px;">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <input type="text" name="message" id="message" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                            <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </form>
                                
                                </div>
                            </div>
                        </div>

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

    <script>
        current_client_id = null;

        $(document).ready(function() {
            client_id = "{{$clients[0]['client_id']}}";

            clientMessages(client_id);
        });

        $('#message_form').on('submit',function(e){
            e.preventDefault();

            $.ajax({
                url: "{{url('/message')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    message: $('#message').val(),
                    client_id: current_client_id,
                },
                success:function(response){
                    clientMessages(current_client_id);
                },
                error: function(response) {
                    console.log(response);
                },
            });
        });

        function clientMessages(client_id){
            $.ajax({
                type: "GET",
                url: "{{url('admin/get_client_messages')}}/" + client_id,
                success: function (data) {
                    updateChatStyle(client_id);
                    $("#client_messages").html(data);
                    current_client_id = client_id;
                },
                error: function() { 
                    console.log(data);
                }
            });
        }

        function updateChatStyle(client_id){
            $('#clients_list').children().removeClass('active text-white list-group-item-light');
            $('#clients_list').children(':not(#client_'+client_id+')').addClass('list-group-item-light')
            $('#client_'+client_id).addClass('active text-white');
        }
    </script>
@stop
