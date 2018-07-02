
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <input type="hidden" id="id">
                                    <label for="name" class="control-label"> &ast; Nom</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="pseudo" class="control-label"> &ast; Pseudo</label>
                                    <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required>

                                    @if ($errors->has('pseudo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label for="email" class="control-label"> &ast; Addresse email </label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="adresse" class="control-label"> &ast; Adresse </label>
                                    <input id="adresse" type="text" class="form-control" name="addresse" value="{{ old('adresse') }}">

                                    @if ($errors->has('adresse'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label for="password" class="control-label">&ast; Mot de passe</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div id="cfp" class="col-lg-6">
                                    <label for="password-confirm" class="control-label"> &ast; Confirmer le mot de passe</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    Image
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">&ast; Type d'utilisateur </label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="0">Employer</option>
                                        <option value="1">Administrateur</option>
                                    </select>
                                </div>
                            </div>
