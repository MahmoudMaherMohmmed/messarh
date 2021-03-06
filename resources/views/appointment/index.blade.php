@extends('template')
@section('page_title')
@lang('messages.appointments.appointments')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-black">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> @lang('messages.appointments.appointments')</h3>
            </div>
            <div class="box-content">
                <div class="btn-toolbar pull-right">
                    <div class="btn-group">
                        <a class="btn btn-danger show-tooltip" data-original-title="Delete Selected record" id="delete-selected" style="margin-left: 10px;">حذف المحددة <i class="fa fa-trash"></i></a>
                        @if (get_action_icons('appointment/create', 'get'))
                        <a class="btn show-tooltip" title="" href="{{ url('appointment/create') }}"
                            data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                        @endif
                        <?php $table_name = 'appointments'; ?>
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" id="check_all" data-table="{{ $table_name }}"></th>
                                <th>@lang('messages.appointments.doctor')</th>
                                <th>@lang('messages.appointments.date')</th>
                                <th>@lang('messages.appointments.start_from')</th>
                                <th>@lang('messages.appointments.end_at')</th>
                                <th>@lang('messages.status.status')</th>
                                <th class="visible-md visible-lg" style="width:130px">@lang('messages.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                            <tr class="table-flag-blue">
                                <th><input type="checkbox" name="selected_rows[]" class="select_all_template" value="{{ $appointment->id }}"></th>
                                <td>{{ $appointment->doctor->getTranslation('name', Session::get('applocale')) }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->from }}</td>
                                <td>{{ $appointment->to }}</td>
                                <td>{{ $appointment->status==0 ? trans('messages.appointments.available') : trans('messages.appointments.reserved')}}</td>
                                <td class="visible-xs visible-sm visible-md visible-lg">
                                    <div class="btn-group">
                                        @if($appointment->status==1)
                                            @php $reservation= $appointment->reservations->first(); @endphp
                                            <a class="btn btn-sm btn-success show-tooltip" href='{{ url("reservation/$reservation->id") }}' title="Show"><i class="fa fa-eye"></i></a>
                                        @else
                                            @if (get_action_icons('appointment/{id}/delete', 'get'))
                                            <form action="{{ route('appointment.destroy', $appointment->id) }}"
                                                method="POST" style="display: initial;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    style="height: 28px;"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                            @endif
                                        @endif
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
</div>
@stop
@section('script')
<script>
    $('#appointment').addClass('active');
	$('#appointment_index').addClass('active');
</script>

<script>
  $("#delete-selected").click(function(event){
    event.preventDefault();
    var _token   = $('meta[name="csrf-token"]').attr('content');

    var confirmation = confirm('Are you sure you want to delete this ?');
    if (confirmation) {
        $.ajax({
            url: "{{url('appointment/delete_selected')}}",
            type:"POST",
            data:{
                selected_rows:table_ids_array,
                _token: _token
            },
            success:function(response){
            if(response) {
                location.reload();
            }
            },
            error: function(error) {
            console.log(error);
            }
        });
    }
  });
</script>
@stop
