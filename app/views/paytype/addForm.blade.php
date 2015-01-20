@extends('main')
@section('content')
@if (!$paytype->id)
{{Form::model($paytype,array('action' => 'PaytypeController@add'))}}
@else
{{Form::model($paytype,array('route' => array('paytype.update', $paytype->id), 'method' => 'PUT'))}}
@endif
<div class="form-group addForm">
<?php
    $message = Session::get('message');
 if ($message) :
     echo "<div class='alert alert-success alert-dismissible' role='alert'>{$message} </div>";
 endif;
?>
{{Form::label('name', 'Название услуги')}}
{{Form::text('name', null, ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('name')}}</div>
{{Form::label('cost', 'Стоимость')}}
{{Form::number('cost', null, array('min' => 0, 'step' => 5,' class' => 'form-control'))}}
<div class="alert-danger" role="alert">{{$errors->first('cost')}}</div>
<br />
{{Form::submit('Добавить', ['class' => 'btn btn-default'])}}

{{Form::close()}}
@stop
</div>