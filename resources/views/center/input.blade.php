<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.description') <span
            class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <ul id="myTab1" class="nav nav-tabs">
            <?php $i = 0; ?>
            @foreach ($languages as $language)
                <li class="{{ $i++ ? '' : 'active' }}"><a href="#description{{ $language->short_code }}"
                        data-toggle="tab"> {{ $language->title }}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            <?php $i = 0; ?>
            @foreach ($languages as $language)
                <div class="tab-pane fade in {{ $i++ ? '' : 'active' }}"
                    id="description{{ $language->short_code }}">
                    <textarea class="form-control col-md-12"
                        name="description[{{ $language->short_code }}]" rows="6">
                        @if ($center) 
                            {{ $center->getTranslation('description', $language->short_code) }}
                        @else
                            {{ old('description.' . $language->short_code) }}
                        @endif
                    </textarea>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.centers.emails') <span class="text-danger">*</span></label>
    <div class="col-sm-4 col-lg-5 controls">
        <input type="email" class="form-control" name="email" placeholder="@lang('messages.centers.email')" value="@if ($center) {!! $center->email !!} @endif" />
    </div>
    <div class="col-sm-5 col-lg-5 controls">
        <input type="email" class="form-control" name="contact_email" placeholder="@lang('messages.centers.contact_email')" value="@if ($center) {!! $center->contact_email !!} @endif" />
    </div>
</div> 

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.centers.phones') <span class="text-danger">*</span></label>
    <div class="col-sm-4 col-lg-5 controls">
        <input type="number" class="form-control" name="phone_1" placeholder="@lang('messages.centers.phone_1')" value="@if ($center) {!! $center->phone_1 !!} @endif" />
    </div>
    <div class="col-sm-5 col-lg-5 controls">
        <input type="number" class="form-control" name="phone_2" placeholder="@lang('messages.centers.phone_2')" value="@if ($center) {!! $center->phone_2 !!} @endif" />
    </div>
</div> 

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.centers.location') <span class="text-danger">*</span></label>
    <div class="col-sm-4 col-lg-5 controls">
        <input type="text" class="form-control" name="lat" value="@if ($center) {!! $center->lat !!} @endif" />
    </div>
    <div class="col-sm-5 col-lg-5 controls">
        <input type="text" class="form-control" name="lng" value="@if ($center) {!! $center->lng !!} @endif" />
    </div>
    <div class="col-sm-12 col-lg-12" id="map" style="height: 300px;"></div>
</div> 

<div class="form-group">
    <label class="col-sm-3 col-md-2 control-label">@lang('messages.Image.Image')</label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                @if($center)
                    <img src="{{$center->logo}}" alt="" />
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">@lang('messages.select_image')</span>
                    <span class="fileupload-exists">Change</span>
                    {!! Form::file('logo',["accept"=>"image/*" ,"class"=>"default"]) !!}
                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>