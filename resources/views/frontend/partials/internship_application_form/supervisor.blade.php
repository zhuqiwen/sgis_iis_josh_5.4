<div class="tab-pane" id="tab2">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="info-text">Who is going to be your <b>internship supervisor</b> ?</h4>
        </div>
        <div class="col-sm-12 col-md-5 col-md-offset-1">
            <div class="form-group">
                {!! Form::label('intern_supervisor_first_name', 'First name') !!}
                {!! Form::text('intern_supervisor_first_name', null, ['class' => 'form-control', 'id' => 'input_first_name']) !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-5">
            <div class="form-group">
                {!! Form::label('intern_supervisor_last_name', 'Last name') !!}
                {!! Form::text('intern_supervisor_last_name', null, ['class' => 'form-control', 'id' => 'input_last_name']) !!}
            </div>
        </div>

        <div class="col-sm-12 col-md-5 col-md-offset-1">
            <div class="form-group">
                {!! Form::label('intern_supervisor_prefix', 'prefix') !!}
                {!! Form::text('intern_supervisor_prefix', null, ['class' => 'form-control', 'id' => 'input_prefix']) !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-5">
            <div class="form-group">
                {!! Form::label('intern_supervisor_email', 'email') !!}
                {!! Form::text('intern_supervisor_email', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-sm-12 col-md-5 col-md-offset-1">
            <div class="form-group">
                {!! Form::label('intern_supervisor_phone_country_code', 'country code (country name)') !!}
                {!! Form::text('intern_supervisor_phone_country_code', null, ['class' => 'form-control', 'id' => 'input_country_code']) !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-5">
            <div class="form-group">
                {!! Form::label('intern_supervisor_phone', 'Phone Number') !!}
                {!! Form::text('intern_supervisor_phone', null, ['class' => 'form-control']) !!}
            </div>
        </div>

    </div>
</div>
