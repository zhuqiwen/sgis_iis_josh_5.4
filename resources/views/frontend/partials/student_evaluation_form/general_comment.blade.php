<div class="tab-pane" id="tab1">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
                {!! Form::hidden('user_id', Sentinel::getUser()->id) !!}
                {!! Form::hidden('intern_application_submitted_by', Sentinel::getUser()->id) !!}

            <div class="row">
                <div class="col-sm-12">
                    {!! Form::label('intern_student_evaluation_performance_rating', 'Compared to other current and former interns, how would you rate this student’s overall performance?') !!}

                </div>
            </div>


                <div class="row">
                    <div class="col-md-4">
                        <label>&nbsp;</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="radio-inline" for="radios-0">
                                    <input type="radio" name="intern_student_evaluation_performance_rating" id="radios-0" value="3">
                                    Outstanding (top 10%)
                                </label>
                            </div>
                        </div>
                        <label>&nbsp;</label>

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="radio-inline" for="radios-1">
                                    <input type="radio" name="intern_student_evaluation_performance_rating" id="radios-1" value="2">
                                    Good (top 25%)
                                </label>
                            </div>
                        </div>
                        <label>&nbsp;</label>

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="radio-inline" for="radios-2">
                                    <input type="radio" name="intern_student_evaluation_performance_rating" id="radios-2" value="1" checked="checked">
                                    Fair (top 50%)
                                </label>
                            </div>
                        </div>
                        <label>&nbsp;</label>

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="radio-inline" for="radios-3">
                                    <input type="radio" name="intern_student_evaluation_performance_rating" id="radios-3" value="-1">
                                    Poor (bottom 50%)
                                </label>
                            </div>
                        </div>
                        <label>&nbsp;</label>

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="radio-inline" for="radios-4">
                                    <input type="radio" name="intern_student_evaluation_performance_rating" id="radios-4" value="0">
                                    Unable to compare
                                </label>
                            </div>
                        </div>





                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('intern_student_evaluation_performance_comment', '&nbsp;') !!}
                            {!! Form::textarea('intern_student_evaluation_performance_comment',
                            'Please feel free to comment:',
                            [
                                'class' => 'form-control',
                                'rows' => '10',
                            ]) !!}
                        </div>
                    </div>
                </div>


            </div>

    </div>
</div>


