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
					<table  class="display table table-bordered table-striped" id="table-auto">
						<thead>
							<tr>
								<th>Фирма</th>
								<th>Марка</th>
								<th>Кузов</th>
								<th>Год выпуска</th>
								<th>Коментарий</th>
								<th>Наличие Лекало</th>
								<th>Изменить</th>
								<th>Удалить</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($autos as $auto)
							<tr id="autoID-{{ $auto->id }}" class="gradeX">
								<td>{{ $auto->firm }}</td>
								<td>{{ $auto->mark }}</td>
								<td>{{ $auto->body }}</td>
								<td>{{ $auto->year_of_issue }}</td>
								<td>{{ $auto->comment }}</td>
								<td>{{ $auto->having_curves }}</td>
								<td><a class="btn btn-default btn-xs" href="{{ 
									url('/edit-auto/' .  $auto->id )
								}}">Изменить</a></td>
								<td><button data-id="{{  $auto->id }}" class="dell-auto btn btn-default btn-xs" href="">Удалить</button></td>
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
@section('script')
	<script type="text/javascript">
		var tableAuto = new app.table('#table-auto');
		$(document).on('click','.dell-auto',  function(data) {
			var id = $(this).data().id;
			formData = new FormData();
			formData.append('id', id);
			formData.append('_method', "DELETE");
			app.ajaxPost('list-auto/delete', formData, function(data){
				tableAuto.deleteRow($('#autoID-' + id));
			});
		});
	</script>
@stop