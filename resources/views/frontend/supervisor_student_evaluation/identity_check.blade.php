<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Welcome to Josh Frontend</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">
    <!--end of page level css-->
</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX">
            <img src="{{ asset('assets/images/sgis_logo.jpg') }}" alt="logo" class="img-responsive mar" height="100" width="100">
            <h3 class="text-primary">Please Verify Your Identity</h3>
            <!-- Notifications -->
            <div id="notific">
                @include('notifications')
            </div>
            {{--<form action="{{ route('supervisor_identity_check') }}" method="POST" id="reg_form">--}}
            <form action="{{ route('supervisor_identity_check') }}" method="POST" id="supervisor_id_check_form">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                <div class="form-group">
{{--                    {!! Form::label('intern_supervisor_first_name', 'Your First Name', ['class' => 'sr-only']) !!}--}}
                    {!! Form::select('intern_supervisor_first_name',
                        ['name1' => 'name1'],
                        NULL,
                        [
                            'placeholder' => 'Your First Name',
                            'class' => 'form-control',
                            'id' => 'supervisor_first_name',
                        ]) !!}
                </div>


                <div class="form-group">
{{--                    {!! Form::label('intern_supervisor_last_name', 'Your First Name', ['class' => 'sr-only']) !!}--}}
                    {!! Form::select('intern_supervisor_last_name',
                        ['name1' => 'name1'],
                        NULL,
                        [
                            'placeholder' => 'Your Last Name',
                            'class' => 'form-control',
                            'id' => 'supervisor_last_name',
                        ]) !!}
                </div>


                <div class="form-group">
{{--                    {!! Form::label('intern_supervisor_email', 'Your First Name', ['class' => 'sr-only']) !!}--}}
                    {!! Form::select('intern_supervisor_email',
                        ['name1' => 'name1'],
                        NULL,
                        [
                            'placeholder' => 'Which Email Belongs To You',
                            'class' => 'form-control',
                            'id' => 'supervisor_email',
                        ]) !!}
                </div>


                <div class="form-group">
{{--                    {!! Form::label('intern_supervisor_phone', 'Your First Name', ['class' => 'sr-only']) !!}--}}
                    {!! Form::select('intern_supervisor_phone',
                        ['name1' => 'name1'],
                        NULL,
                        [
                            'placeholder' => 'Which Email Belongs To You',
                            'class' => 'form-control',
                            'id' => 'supervisor_phone',
                        ]) !!}
                </div>


                <div class="form-group">
{{--                    {!! Form::label('intern_supervisor_first_name', 'Your First Name', ['class' => 'sr-only']) !!}--}}
                    {!! Form::select('intern_application_first_name',
                        ['name1' => 'name1'],
                        NULL,
                        [
                            'placeholder' => 'The internship student\'s name',
                            'class' => 'form-control',
                            'id' => 'student_name',
                        ]) !!}
                </div>



                <div class="clearfix"></div>
                <button type="submit" class="btn btn-block btn-primary">Next</button>
            </form>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/register_custom.js') }}"></script>
<!--global js end-->
</body>
</html>
