<div class="form-group">
    <div class="col-lg-6 {{ $errors->has('sociologue') ? ' has-error' : '' }}">
        <input type="hidden" name="id" id="id">
        <label for="conditionnement" class="control-label"> &ast; libelle_conditionnement</label>
        <input id="conditionnement" type="text" class="form-control" name="conditionnement" required>

        @if ($errors->has('sociologue'))
            <span class="help-block">
                <strong>{{ $errors->first('conditionnement') }}</strong>
            </span>
        @endif
    </div>
</div>

