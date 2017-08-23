<?php
$credit_hours = [
    '0' => 0,
    '1' => 1,
    '2' => 2,
    '3' => 3,
];

?>


<div class="tab-pane" id="tab3">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="info-text"> Let's start with the <b>basic details</b></h4>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::hidden('user_id', Sentinel::getUser()->id) !!}
                {!! Form::hidden('intern_application_submitted_by', Sentinel::getUser()->id) !!}
                {!! Form::label('intern_application_year', 'Which academic year?') !!}
                {!! Form::select('intern_application_year',
                ['2017' => '2017', '2018' => '2018', '2019'=> '2019'],
                '2018',
                ['class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_term', 'Which Term?') !!}
                {!! Form::select('intern_application_term',
                ['Fall' => 'Fall', 'Spring' => 'Spring', 'Summer' => 'Summer'],
                'Summer',
                ['class' => 'form-control']) !!}
                <br>
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_application_paid_internship', 'Is this internship with any payment?') !!}
                {!! Form::select('intern_application_paid_internship',
                                [0 => 'No', 1 => 'Yes'],
                                1,
                                ['class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('intern_application_credit_hours', 'Credit Hours Desired') !!}

                <div class="input-group">
                    {!! Form::select('intern_application_credit_hours',
                                      $credit_hours,
                                      '0',
                                      ['class' => 'form-control']) !!}
                    <span class="input-group-addon">credits</span>
                </div>
            </div>
        </div>
    </div>
</div>


