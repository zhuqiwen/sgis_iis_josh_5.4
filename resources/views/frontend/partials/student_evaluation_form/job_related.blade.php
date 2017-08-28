<div class="tab-pane" id="tab4">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label(
                    'intern_student_evaluation_development_rating',
                    'An important aspect of an internship is the application of academic knowledge to the development of job-related skills. How would you rate the student’s development during the internship?'
                ) !!}


                <div class="col-md-12">
                    <div class="radio">
                        <label for="radios-0">
                            <input type="radio" name="intern_student_evaluation_development_rating" id="radios-0" value="3">
                            Outstanding (top 10%): learned and applied new skills <strong>very rapidly</strong>.
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios-1">
                            <input type="radio" name="intern_student_evaluation_development_rating" id="radios-1" value="2">
                            Good (top 25%): learned and applied new skills <strong>relatively fast</strong>.
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios-2">
                            <input type="radio" name="intern_student_evaluation_development_rating" id="radios-2" value="1">
                            Fair (top 50%): learned and applied new skills.
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios-3">
                            <input type="radio" name="intern_student_evaluation_development_rating" id="radios-3" value="-1">
                            Poor (bottom 50%): <strong>did not</strong> learn or apply new skills well.
                        </label>
                    </div>
                </div>



            </div>
        </div>

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_suitability', 'How would you rate this student’s suitability to a career in your field?') !!}
                {!! Form::textarea('intern_student_evaluation_suitability',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '5',
	            ]) !!}
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_job_advice', 'Please provide any advice that will assist the student in improving his/her preparedness for a permanent, full-time position.') !!}
                {!! Form::textarea('intern_student_evaluation_job_advice',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '10',
	            ]) !!}
            </div>
        </div>

    </div>
</div>


