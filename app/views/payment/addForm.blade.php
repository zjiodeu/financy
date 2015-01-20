@extends('main')
@section('content')
@if (!$payment->id)
{{Form::model($payment,array('action' => 'PaymentController@add'))}}
@else
{{Form::model($payment,array('route' => array('payment.update', $payment->id), 'method' => 'PUT'))}}
@endif
<div class="form-group addForm">
<?php
    $message = Session::get('message');
 if ($message) :
     echo "<div class='alert alert-success alert-dismissible' role='alert'>{$message} </div>";
 endif;
?>
{{Form::label('type', 'Тип платежа')}}
{{Form::select('type', $paytypes, null, ['class' => 'form-control'])}}
 <div class="alert-danger" role="alert">{{$errors->first('type')}}</div>
{{Form::label('amount', 'Сумма к оплате')}}
{{Form::number('amount', null, ['min' => 0, 'step' => 1, 'class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('amount')}}</div>
{{Form::label('date', 'За какой месяц')}}
{{Form::input('date', 'date', null,['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('date')}}</div>
{{Form::label('payer_id', 'Кто')}}
{{Form::select('payer_id', $users, null, ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('payer_id')}}</div>
{{Form::label('receiver_id', 'Кому')}}
{{Form::select('receiver_id', $users, null, ['class' => 'form-control'])}}
<div class="alert-danger" role="alert">{{$errors->first('receiver_id')}}</div>
<br />
{{Form::submit('Добавить', ['class' => 'btn btn-default'])}}

{{Form::close()}}
@stop
</div>