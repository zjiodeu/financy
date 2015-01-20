@extends('main')
@section('content')
@if (!$user->id)
{{Form::model($user,array('action' => 'UserController@add'))}}
@else
{{Form::model($user,array('route' => array('user.update', $user->id), 'method' => 'PUT'))}}
@endif
<div class="form-group addForm">
<?php
    $message = Session::get('message');
 if ($message) :
     echo "<div class='alert alert-success alert-dismissible' role='alert'>{$message} </div>";
 endif;
?>
{{Form::label('username', 'Логин')}}
{{Form::text('username', null, ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('username')}}</div>
{{Form::label('info', 'Информация')}}
{{Form::textarea('info', null, ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('info')}}</div>
{{Form::label('role', 'Роль')}}
{{Form::select('role', $roles, null, ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('role')}}</div>
 @if (!$user->id)
{{Form::label('password', 'Пароль')}}
{{Form::password('password',  ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('password')}}</div>
 @endif
<br />
{{Form::submit('Добавить', ['class' => 'btn btn-default'])}}

{{Form::close()}}
@stop
</div>