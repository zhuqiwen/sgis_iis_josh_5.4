<div class="tab-pane" id="tab3">
    <div class="row">
        <div style="text-align: center">
            <h4>Faculty Recommender</h4>

        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="form-group">
                        {!! Form::label('recommender_first_name', 'First name') !!}
                        {!! Form::text('recommender_first_name', null, ['class' => 'form-control', 'placeholder' => 'Your recommender\'s first name']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('recommender_last_name', 'Last name') !!}
                        {!! Form::text('recommender_last_name', null, ['class' => 'form-control', 'placeholder' => 'Your recommender\'s last name']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('recommender_prefix', 'Title / Prefix') !!}
                        {!! Form::text('recommender_prefix', null, ['class' => 'form-control', 'placeholder' => 'Your recommender\'s title or prefix, if applicable']) !!}

                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::label('recommender_email', 'IU Email') !!}
                        {!! Form::text('recommender_email', null, ['class' => 'form-control', 'placeholder' => 'Your recommender\'s work email']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('recommender_department', 'Department') !!}
                        {!! Form::text('recommender_department', null, ['class' => 'form-control', 'placeholder' => 'Your recommender\'s department in SGIS']) !!}

                    </div>

                    <div class="form-group">
                        {!! Form::hidden('ferpa_waive', '0', false) !!}
                        <label class="checkbox-inline">
                            <input checked="checked" name="ferpa_waive" type="checkbox" value="1" />
                            I waive my right to inspect this letter of recommendation, in accordance with the Family Education Rights and Privacy Act of 1974.
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>