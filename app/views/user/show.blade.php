@extends('main')
@section('content')
<table class="table table-hover table-condensed">
    <thead>
    <tr>
        <th>Логин</td>
        <th>Информация</th>
        <th>Роль</th>
        <th>Дата регистрации</th>
        <th>Опции</th>
    </tr>
    </thead>
    <tbody>
@foreach($rows as $row)
<tr>
    <td>{{ $row->username }}</td>
    <td>{{ Str::limit($row->info, 200) }}</td>
    <td>{{ $row->role }}</td>
    <td>{{ $row->created_at }}</td>
    <td>
        {{ HTML::link("user/addForm/" . $row->id, '', ['class' => 'glyphicon glyphicon-edit', 'title' => "Редактировать"])}}
        {{ HTML::link("user/delete/" . $row->id, '', ['class' => 'glyphicon glyphicon-remove', 'title' => "Удалить"])}}
    </td>
    <tr />
            @endforeach
</tbody>
</table>
@stop