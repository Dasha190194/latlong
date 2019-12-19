<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

<label for="{{$id['address']}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

<div class="{{$viewClass['field']}}">

    @include('admin::form.error')

    <div class="row">
        <div class="col-md-3">
            <input id="{{$id['address']}}" name="{{$name['address']}}" class="form-control" value="{{ old($column['address'], $value['address']) }}" {!! $attributes !!} />
        </div>

        <div class="col-md-3 col-md-offset-3">
            <div class="input-group">
                <input type="text" class="form-control" id="search-{{$id['address']}}">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
    </div>

    <br>

    <div id="map_{{$id['address']}}" style="width: 100%;height: {{ $height }}px"></div>

    @include('admin::form.help-block')

</div>
</div>
