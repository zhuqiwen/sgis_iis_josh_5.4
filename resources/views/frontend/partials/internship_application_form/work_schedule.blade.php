<div class="tab-pane" id="tab7">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text">Would you tell us more about your <b>work schedule</b></h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('intern_application_work_hours_per_week', 'Work hours per week') !!}
                    <div class="input-group">
                        {!! Form::number('intern_application_work_hours_per_week', '0', ['class' => 'form-control']) !!}
                        <span class="input-group-addon" style="color: black;">hours</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('intern_application_work_schedule', 'Work schedule details ') !!}
                    {!! Form::textarea('intern_application_work_schedule','', ['class' => 'form-control', 'rows' => 5]) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('intern_application_description', 'Expected experience and duties') !!}
                    {!! Form::textarea('intern_application_description', '', ['class' => 'form-control', 'rows' => 9]) !!}
                </div>
            </div>
        </div>

    </div>
</div>
