<div class="tab-pane" id="tab6">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text"><b>How much</b> would you expect to spend?</h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_budget_airfare', 'Airfare') !!}
                <div class="input-group">
                    {!! Form::number('intern_application_budget_airfare', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_budget_housing', 'Housing in total') !!}
                <div class="input-group">
                    {!! Form::number('intern_application_budget_housing', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_budget_meals', 'Meals in total') !!}
                <div class="input-group">
                    {!! Form::number('intern_application_budget_meals', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_budget_transportation', 'Transportation in total') !!}
                <div class="input-group">
                    {!! Form::number('intern_application_budget_transportation', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_budget_others', 'Other costs(i.e. visa fee)') !!}
                <div class="input-group">
                    {!! Form::number('intern_application_budget_others', '0', ['class' => 'form-control']) !!}
                    <span class="input-group-addon">$</span>
                </div>
            </div>
        </div>

    </div>
</div>
