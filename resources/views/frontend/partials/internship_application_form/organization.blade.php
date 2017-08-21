<?php
$organization_types = [
    'government' => 'Government',
    'ngo' => 'NGO',
    'industry' => 'Industry',
    'other' => 'Other',
];
?>
<div class="tab-pane" id="tab1">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h4 class="info-text"><b>Which organization</b> is this internship with?</h4>
        </div>
        <div class="col-sm-12 col-md-5 col-md-offset-1">
            <div class="form-group">
                {!! Form::label('name', 'Organization name') !!}
                {!! Form::text('name', 'Please do not use any abbreviation, such as IBM', ['id' => 'input-org-name','class' => 'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-md-offset-1">
            <div class="form-group">
                {{--here need to check if the url is legal--}}
                {!! Form::label('url', 'Organization Website URL') !!}
                {!! Form::text('url', 'https://', ['id' => 'input-org-url', 'class' => 'form-control']) !!}
                <br>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-md-offset-1">
            <div class="form-group">
                {!! Form::label('type', 'What type the organization is?') !!}
                {!! Form::select('type', $organization_types, NULL, ['class' => 'form-control']) !!}
                <br>
            </div>
        </div>

    </div>


</div>


