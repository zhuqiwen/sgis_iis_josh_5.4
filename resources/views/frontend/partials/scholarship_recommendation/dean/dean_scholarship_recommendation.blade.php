<div class="tab-pane" id="tab1">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('recommender_recommendation', '') !!}
                            {!! Form::textarea('recommender_recommendation',
                            'Please feel free to comment:',
                            [
                                'class' => 'form-control',
                                'id' => 'recommendation_content',
                                'rows' => '30',
                            ]) !!}
                        </div>
                    </div>
                </div>


        </div>

    </div>
</div>


