<?php

$countries = [
    'United States' => 'United States',
    'country 1' => 'fdsa',
    'country 2' => 'fdddsa',
    'country 3' => 'ff',
    'country 4' => 'eee',
];
?>
<div class="tab-pane" id="tab4">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text"><b>Where</b> is the internship</h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">

                {{--Here dynamically check if current country is in warning list --}}
                {{--if so display the warning; the warning in the same line of "Where is the internship" label --}}
                {!! Form::label('intern_application_country', 'Country') !!}
                {!! Form::select('intern_application_country',
                                  $countries,
                                  null,
                                  [
                                  'placeholder' => 'please select internship country',
                                  'id' => 'country-select',
                                  'class' => 'form-control'
                                  ]) !!}


            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_state', 'State/Province/Region') !!}
                {!! Form::text('intern_application_state',
                                null,
                                [
                                'id' => 'state-input',
                                'class' => 'form-control'
                                ]) !!}

            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">

                {!! Form::label('intern_application_city', 'City') !!}
                {!! Form::text('intern_application_city', null, ['id' => 'city-input', 'class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_street', 'Street') !!}
                {!! Form::text('intern_application_street', null, ['class' => 'form-control', 'id' => 'street-input']) !!}
            </div>
        </div>
    </div>
</div>
