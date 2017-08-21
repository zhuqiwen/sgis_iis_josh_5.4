<div class="form-group {{ $errors->first('gender', 'has-error') }}">
	<label class="sr-only">Gender</label>
	<label class="radio-inline">
		<input type="radio" name="gender" id="inlineRadio1" value="male"> Male
	</label>
	<label class="radio-inline">
		<input type="radio" name="gender" id="inlineRadio2" value="female"> Female
	</label>
	{!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
</div>