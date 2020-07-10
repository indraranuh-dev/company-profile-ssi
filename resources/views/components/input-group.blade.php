<fieldset class="form-group row">
    <div class="col-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-{{$icon}}"></i>
                </span>
            </div>
            {{$slot}}
        </div>
        {{$error}}
    </div>
</fieldset>
