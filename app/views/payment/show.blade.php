@extends('main')
@section('content')
<table class="table table-hover table-condensed">
    <thead>
    <tr>
        <th>Вид платежа</th>
        <th>Сумма</th>
        <th>Дата</th>
        <th>Плательщик</th>
        <th>Получатель</th>
        <th>Опции</th>
    </tr>
    </thead>
    <tbody>
@foreach($rows as $row)
<tr>
    <td>{{ $row->name }}</td>
    <td>{{ $row->amount }}</td>
    <td>{{ $row->date }}</td>
    <td>{{ $row->payername }}</td>
    <td>{{ $row->receivername }}</td>
    <td>
        {{ HTML::link("payment/addForm/" . $row->id, '', ['class' => 'glyphicon glyphicon-edit', 'title' => "Редактировать"])}}
        {{ HTML::link("payment/delete/" . $row->id, '', ['class' => 'glyphicon glyphicon-remove', 'title' => "Удалить"])}}
    </td>
    <tr />
            @endforeach
</tbody>
</table>
@stop