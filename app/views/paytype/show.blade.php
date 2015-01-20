@extends('main')
@section('content')
<table class="table table-hover table-condensed">
    <thead>
    <tr>
        <th>Название платежа</th>
        <th>Стоимость</th>
        <th>Опции</th>
    </tr>
    </thead>
  <tbody>
@foreach($rows as $row)
<tr>
    <td>{{ $row->name }}</td>
    <td>{{ $row->cost }}</td>
    <td>
        {{ HTML::link("paytype/addForm/" . $row->id, '', ['class' => 'glyphicon glyphicon-edit', 'title' => "Редактировать"])}}
        {{ HTML::link("paytype/delete/" . $row->id, '', ['class' => 'glyphicon glyphicon-remove', 'title' => "Удалить"])}}
    </td>
    <tr />
            @endforeach
</tbody>
</table>
@stop