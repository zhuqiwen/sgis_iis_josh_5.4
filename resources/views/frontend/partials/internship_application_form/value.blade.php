<div class="tab-pane" id="tab8">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text">
                What's the <b>value</b> of this internship?
            </h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_reasons', 'Reasons') !!}
                {!! Form::textarea('intern_application_reasons', '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_cultural_interaction', 'Cultural interaction') !!}
                {!! Form::textarea('intern_application_cultural_interaction', '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_challenges', 'Challenges') !!}
                {!! Form::textarea('intern_application_challenges', '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
    </div>

</div>
