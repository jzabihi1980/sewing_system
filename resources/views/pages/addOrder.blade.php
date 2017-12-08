@extends('layouts.app')

@section('heading')
<div class="page-heading">
	<h3>
		Добавить заказ
	</h3>
	<ul class="breadcrumb">
		<li>
			<a href="{{ url('/') }}"> Главная</a>
		</li>
		<li class="active"> Добавить заказ </li>
	</ul>
</div>
@stop

@section('content')

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Добавить заказ
		</header>
		<div class="panel-body">
			<div class="form">
				<form class="cmxform form-horizontal adminex-form" id="add-order" method="POST" action="{{ url('order/post-add-order') }}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="firstname" class="control-label col-lg-2">Выберете клиента</label>
						<div class="col-lg-8">
							<select id="single" name="client_id" class="js-example-basic-single form-control select2-single">
								<option></option>
								@foreach ($clients as $client)
								<option value="{{ $client->id }}">{{ $client->fio }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-2">
							<div class="row">
								<button class="btn btn-default" type="button">Добавить клиента</button>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<label for="lastname" class="control-label col-lg-2">Выберете мастера</label>
						<div class="col-lg-10">
							<select name="master_id" class="form-control">
								<option>   </option>
								@foreach ($masters as $master)
								<option value="{{ $master->id }}">{{ $master->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group ">
						<label for="username" class="control-label col-lg-2">Дата окончания работ</label>
						<div class="col-lg-10">
							<input class="form-control form-control-inline input-medium default-date-picker" name="date_end" type="text" value="">
						</div>
					</div>
					<section class="content-order">
					</section>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<ul class="nav nav-pills">
								<li >
									<a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary">
										Материалы, фурнитура<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-level material-tkani" role="menu" aria-labelledby="dropdownMenu">
									</ul>
								</li>
								<li>
									<a id="dLabel" title="Наименование предметов интерьера автомобиля" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="#">
										Работа по заказу  <span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-level interior-auto" role="menu" aria-labelledby="dropdownMenu">
									</ul>
								</li>
								<li>
									<a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="#">
										Дополнительная работа по заказу<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-level work-dops" role="menu" aria-labelledby="dropdownMenu">
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="form-group ">
						<label for="newsletter" class="control-label col-lg-2 col-sm-3">Стоимость за материалы</label>
						<div class="col-lg-2 col-sm-2">
							<input disabled="disabled" value="" class="form-control " id="sum-materialTkani" name="price" type="text">
						</div>
						<label for="newsletter" class="control-label col-lg-2 col-sm-3">Стоимость за работу</label>
						<div class="col-lg-2 col-sm-2">
							<input disabled="disabled" value="" class="form-control " id="sum-work" name="price" type="text">
						</div>
						<label style="padding-left: 0; padding-right: 0;" for="newsletter" class="control-label col-lg-2 col-sm-3">Стоимость за интерьер</label>
						<div class="col-lg-2 col-sm-2">
							<input disabled="disabled" value="" class="form-control " id="sum-interior" name="price" type="text">
						</div>
					</div>

					<div class="form-group ">
						<label for="newsletter" class="control-label col-lg-2 col-sm-3">Общая сумма</label>
						<div class="col-lg-10 col-sm-9">
							<input disabled="disabled" value="" class="form-control " id="allPrice" name="price" type="text">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button class="btn btn-primary" type="submit">Создать заказ</button>
							<button class="btn btn-default" type="button">Печать заказа</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<script type="text/template" id="sub-menu-folder-template">
	<li><a class="folder" data-id="<%= item.href %>" data-type="<%= type %>"><%= item.text %></a></li>
</script>
<script type="text/template" id="sub-menu-template">
	<li class="dropdown-submenu">
		<a tabindex="-1" href="#"><%= text %></a>
		<ul class="dropdown-menu">
			<%= subMenu %>
		</ul>
	</li>
</script>
<script type="text/template" id="material-tkani-template">
	<div id="item-materialTkani-<%= id %>" class="form-group ">
		<label for="password" class="control-label col-lg-2"><%= name %></label>
		<div class="col-lg-7">
			<select class="form-control select-price">
				<option>   </option>
				@foreach ($materials as $material)
				<option data-id="<%= id %>" value="{{ $material->id }}" data-type="material-tkani" data-price="{{ $material->price }}">"{{ $material->name }}" - {{ $material->price }} руб.</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon">П/М</span>
				<input type="text" data-type="material-tkani" data-id="<%= id %>" class="form-control count-element" placeholder="Кол-Во">
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<div class="row">
				<button type="button" data-type="materialTkani" data-id="<%= id %>" class="btn btn-default dell-item"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</script>
<script type="text/template" id="work-dops-template">
	<div id="item-work-<%= id %>" class="form-group ">
		<label for="password" class="control-label col-lg-2"><%= name %></label>
		<div class="col-lg-7">
			<select class="form-control select-price">
				<option>   </option>
				<% _.forEach(items,function(value) { %>
				<option data-id="<%= id %>" data-item-id="<%= value.id %>" data-type="work" data-price="<%= value.price %>">"<%= value.name %>" - <%= value.price %> руб.</option>
				<% }); %>
			</select>
		</div>
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon">Кол-Во</span>
				<input type="text" data-type="work" data-id="<%= id %>" class="form-control count-element" placeholder="Кол-Во">
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<div class="row">
				<button type="button" data-type="work" data-id="<%= id %>" class="btn btn-default dell-item"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</script>
<script type="text/template" id="interior-auto-template">
	<div id="item-interior-<%= id %>" class="form-group ">
		<label for="password" class="control-label col-lg-2"><%= name %></label>
		<div class="col-lg-7">
			<select class="form-control select-price">
				<option>   </option>
				<% _.forEach(items,function(value) { %>
				<option data-id="<%= id %>" data-item-id="<%= value.id %>" data-type="interior-auto" data-price="<%= value.price %>">"<%= value.name %>" - <%= value.price %> руб.</option>
				<% }); %>
			</select>
		</div>
		<div class="col-lg-2">
			<div class="input-group">
				<span class="input-group-addon">Кол-Во</span>
				<input type="text" data-type="interior-auto" data-id="<%= id %>" class="form-control count-element" placeholder="Кол-Во">
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<div class="row">
				<button type="button" data-type="interior" data-id="<%= id %>" class="btn btn-default dell-item"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</script>
@endsection

@section('script')

<script type="text/javascript">
	$(".js-example-basic-single").select2({
		theme: "bootstrap",
		placeholder: "Список клиентов",
		width: null,
		containerCssClass: ':all:'
	});
	$('.default-date-picker').datepicker({
		format: 'dd.mm.yyyy'
	});
	$(".js-example-basic-single option:selected").val();
	var arrayPrice = {
		materialTkani: [],
		work: [],
		interior: []
	};
	$(document).on('click', '.dell-item', function(e){
		var type = $(this).data().type;
		var id = $(this).data().id;
		$('#item-' + type + '-' + id).remove();
		delete arrayPrice[type][id];
		$('#sum-' + type).val(finalCost(arrayPrice[type]));
		$('#allPrice').val(finalCost(arrayPrice.materialTkani) + finalCost(arrayPrice.work) + finalCost(arrayPrice.interior));

	});
	$('#add-order').on('submit', function(event) {
		event.preventDefault();
		var form = $(this);
		var price = {
			materials: +$('#sum-materialTkani').val(),
			werk: +$('#sum-work').val(),
			interior: +$('#sum-interior').val(),
			all: +$('#allPrice').val()
		}
		formData = new FormData(form.get(0));
		formData.append('arrayPrice', JSON.stringify(arrayPrice));
		formData.append('price', JSON.stringify(price));
		app.ajaxPostForm('order/post-add-order', formData, function(data) {
			// body...
		});
	});
	$(document).on('click', '.folder', function(event) {
		var name = $(this).text();
		var type = $(this).data().type;
		var id = $(this).data().id;
		if (type == 'material-tkani')
		{
			var html = _.template(document.getElementById('material-tkani-template').innerHTML)({
				name: name, 
				id: id
			});
			$('.content-order').append(html);
			arrayPrice.materialTkani[id] = {price: 0, count: 0, materialID: 0, materialTkani: id};
		}
		if (type == 'work-dops')
		{
			formData = new FormData();
			formData.append('id', id);
			app.ajaxPost('werk/get-werk-item', formData, function(data) {
				var html = _.template(document.getElementById('work-dops-template').innerHTML)({
					name: name,
					id: id,
					items: data
				});
				$('.content-order').append(html);
				arrayPrice.work[id] = {price: 0, count: 0, work: 0, type: 0};
			});
		}
		if(type == 'interior-auto')
		{
			formData = new FormData();
			formData.append('id', id);
			app.ajaxPost('auto/get-auto', formData, function(data) {
				var html = _.template(document.getElementById('interior-auto-template').innerHTML)({
					name: name,
					id: id,
					items: data
				});
				$('.content-order').append(html);
				arrayPrice.interior[id] = {price: 0, count: 0, interiorAuto: 0, type: 0};
			});
		}
	});
	var subMaterialTkani = <?php echo(string)($subMaterialTkani);?>;
	var WorkDops = <?php echo(string)($WorkDops);?>;
	var InteriorAuto = <?php echo(string)($InteriorAuto);?>;
	function runSubMenu(array, type) {
		var html = '';
		var folder = false;
		for (var i = 0; i < array.length; i++) {
			if(array[i].nodes != null) {
				var subMenu	= runSubMenu(array[i].nodes, type);
				var tmpl = _.template(document.getElementById('sub-menu-template').innerHTML)({
					text: array[i].text,
					subMenu: subMenu
				});
				html += tmpl;
			}
			else {
				if (array[i].nodes == null) {
					var tmpl = _.template(document.getElementById('sub-menu-folder-template').innerHTML)({item: array[i], type: type});	
					html += tmpl;
				}
			}
		}
		return html
	}
	function finalCost(array) {
		var priceSum = 0;
		array.forEach(function(item, i, arr) {
			priceSum  += item.price * item.count;
		});
		return priceSum;
	}
	$(document).on('change', '.select-price' , function () {
		var optionSelected = $("option:selected", this);
		var id = optionSelected.data().id;
		var type = optionSelected.data().type;
		if (type == 'material-tkani')
		{
			arrayPrice.materialTkani[id].price = +optionSelected.data().price;
			arrayPrice.materialTkani[id].materialID = +optionSelected.val();
			$('#sum-materialTkani').val(finalCost(arrayPrice.materialTkani));
		}
		if (type == 'work')
		{
			arrayPrice.work[id].price = +optionSelected.data().price;
			arrayPrice.work[id].work = +id;
			arrayPrice.work[id].type = +optionSelected.data('item-id');
			$('#sum-work').val(finalCost(arrayPrice.work));
		}
		if (type == 'interior-auto')
		{
			arrayPrice.interior[id].price = +optionSelected.data().price;
			arrayPrice.interior[id].interiorAuto = +id;
			arrayPrice.interior[id].type = +optionSelected.data('item-id');
			$('#sum-interior').val(finalCost(arrayPrice.interior));
		}
		$('#allPrice').val(finalCost(arrayPrice.materialTkani) + finalCost(arrayPrice.work) + finalCost(arrayPrice.interior));
	});
	$(document).on('input', '.count-element' , function () {
		var id = $(this).data().id;
		var type = $(this).data().type; 
		if (type == 'material-tkani')
		{
			arrayPrice.materialTkani[id].count = +$(this).val();
			$('#sum-materialTkani').val(finalCost(arrayPrice.materialTkani));
		}
		if (type == 'work')
		{
			arrayPrice.work[id].count = +$(this).val();
			$('#sum-work').val(finalCost(arrayPrice.work));
		}
		if (type == 'interior-auto')
		{
			arrayPrice.interior[id].count = +$(this).val();
			$('#sum-interior').val(finalCost(arrayPrice.interior));
		}
		$('#allPrice').val(finalCost(arrayPrice.materialTkani) + finalCost(arrayPrice.work) + finalCost(arrayPrice.interior));
	});
	$('.material-tkani').append(runSubMenu(subMaterialTkani, 'material-tkani'));
	$('.work-dops').append(runSubMenu(WorkDops, 'work-dops'));
	$('.interior-auto').append(runSubMenu(InteriorAuto, 'interior-auto'));
</script>

@stop