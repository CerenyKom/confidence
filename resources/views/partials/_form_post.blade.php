<div class="form-group {{ $errors->has('titre') ? ' has-error' : '' }}">
    <label>
        <input class="form-control" type="text" name="titre" placeholder="titre">
    </label>
    @if ($errors->has('titre'))
        <span class="help-block">
            <strong>{{ $errors->first('titre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group  {{ $errors->has('post') ? ' has-error' : '' }}">
    <div class="box_Pos">
        <textarea name="post" id="" cols="90" rows="3" class="form-control" placeholder="contenue"></textarea>
        <div class="element">
            <button type="button" class="btn-default"> <i class="fa fa-camera"></i></button>
            <button type="button" class="btn-default"> <i class="fa fa-video-camera"></i></button>
            <button type="button" class="btn-default"> <i class="fa fa-microphone"></i></button>
        </div>
    </div>
    @if ($errors->has('post'))
        <span class="help-block">
            <strong>{{ $errors->first('post') }}</strong>
        </span>
    @endif
</div>