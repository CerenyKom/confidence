<div class="form-group">
    <div class="col-lg-6 {{ $errors->has('Designation') ? ' has-error' : '' }}">
        <input type="hidden" name="id" id="id">
        <label for="categorie" class="control-label"> &ast; libelle_categorie</label>
        <input id="categorie" type="text" class="form-control" name="categorie" required>

        @if ($errors->has('Designation'))
            <span class="help-block">
                <strong>{{ $errors->first('categorie') }}</strong>
            </span>
        @endif
    </div>
</div>

