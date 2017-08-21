<div class="tab-pane" id="tab5">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text">Great! <b>When?</b> </h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_depart_date', 'Departure date') !!}
                {!! Form::date('intern_application_depart_date',
                                \Carbon\Carbon::now(),
                                ['class' => 'form-control']) !!}


            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_return_date', 'Return date') !!}
                {!! Form::date('intern_application_return_date',
                                \Carbon\Carbon::now(),
                                ['class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">

                {!! Form::label('intern_application_start_date', 'Start date') !!}
                {!! Form::date('intern_application_start_date',
                                \Carbon\Carbon::now(),
                                ['class' => 'form-control']) !!}
                <br>

            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_end_date', 'End date') !!}
                {!! Form::date('intern_application_end_date',
                                \Carbon\Carbon::now(),
                                ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
