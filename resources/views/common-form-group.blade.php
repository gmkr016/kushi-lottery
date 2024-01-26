<div class="form-group">
    <label for="{{$id}}">{{str($id)->headline()}}</label>
    <input type="{{$type}}"
           class="form-control"
           id="{{$id}}"
           value="{{$value ?? null}}"
           name="{{$id}}">
    @if(isset($helpText))
        <small id="{{str($id)->camel()}}Help"
               class="form-text text-muted">
            {{$helpText}}
        </small>
    @endif
</div>
