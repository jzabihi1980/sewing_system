@extends('layouts.app')

@section('heading')
<div class="page-heading">
	<h3>
		Страница заказов
	</h3>
	<ul class="breadcrumb">
		<li>
			<a href="{{url('/')}}">Главная</a>
		</li>
		<li class="active"> Заказы </li>
	</ul>
</div>
@stop

@section('content')

<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				Таблица заказов
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
								<th>Менеджер</th>
								<th>Клиент</th>
								<th>Мастер</th>
								<th>Телефон</th>
								<th>Сумма</th>
								<th>Дата приема</th>
								<th>Дата конца</th>
								<th>Статус</th>
								<th>Операция</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $order)
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{ $order->userManager->name }}</td>
								<td>{{ $order->client->fio }}</td>
								<td>{{ $order->userMaster->name }}</td>
								<td>{{ $order->client->phone }}</td>
								<td>{{ json_decode($order->price)->all}}</td>
								<td>{{ date("d.m.Y",strtotime($order->date_priem)) }}</td>
								<td>{{ date("d.m.Y",strtotime($order->date_end)) }}</td>
								<td>{{ $order->status }}</td>
								<td>
									<a class="btn btn-default btn-sm" href="{{ url('/order/status-true/' . $order->id) }}"><i class="fa fa-rub" aria-hidden="true"></i></a>
									<a class="btn btn-default btn-sm" href="{{ url('/order/dell-orders/' . $order->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
									<a class="btn btn-default btn-sm" href=""><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
								</td>
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
