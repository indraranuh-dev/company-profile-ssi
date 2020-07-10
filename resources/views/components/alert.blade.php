<div class="row my-2">
    <div class="col-12">
        <div class="alert bg-{{$type}} alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{$slot}}
        </div>
    </div>
</div>
