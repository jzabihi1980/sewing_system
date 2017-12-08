@extends('layouts.app')

@section('heading')
<div class="page-heading">
    <h3>
        Страница клиентов
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="{{url('/')}}">Главная</a>
        </li>
        <li class="active"> Клиенты </li>
    </ul>
</div>
@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Таблица клиентов
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ФИО</th>
                                <th>Авто</th>
                                <th>Телефон</th>
                                <th>Изменить</th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr class="gradeX">
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->fio }}</td>
                                <td>{{ isset($client->auto->firm) ? $client->auto->firm : '' . ' ' . 
                                    (isset($client->auto->mark) ? $client->auto->mark : '')
                                }}</td>
                                <td>{{ $client->phone }}</td>
                                <td><a class="btn btn-default btn-xs" href="">Изменить</a></td>
                                <td><a class="btn btn-default btn-xs" href="">Удалить</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
