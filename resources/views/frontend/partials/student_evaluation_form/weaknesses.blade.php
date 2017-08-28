<div class="tab-pane" id="tab3">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_weakness', 'Are there any aspects of the student’s performance during the internship in which you think the student needs improvement?') !!}
                {!! Form::textarea('intern_student_evaluation_weakness',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '5',
	            ]) !!}
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_weakness_examples', 'Did the intern do anything poorly?') !!}
                {!! Form::textarea('intern_student_evaluation_weakness_examples',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '10',
	            ]) !!}
            </div>
        </div>

        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                {!! Form::label('intern_student_evaluation_weakness_remedy', 'How might this be remedied?') !!}
                {!! Form::textarea('intern_student_evaluation_weakness_remedy',
                null,
                [
	                'class' => 'form-control',
	                'rows' => '10',
	            ]) !!}
            </div>
        </div>
    </div>
</div>


