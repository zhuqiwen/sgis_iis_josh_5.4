<div class="tab-pane" id="tab2">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_noteworthy_aspects', 'Are there any aspects of the student’s performance during the internship that you consider to be particularly noteworthy?') !!}
                {!! Form::textarea('intern_student_evaluation_noteworthy_aspects',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '5',
	            ]) !!}
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_noteworthy_examples', 'Did the intern do anything unusually well or put in extra effort in any area?') !!}
                {!! Form::textarea('intern_student_evaluation_noteworthy_examples',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '10',
	            ]) !!}
            </div>
        </div>

    </div>
</div>


