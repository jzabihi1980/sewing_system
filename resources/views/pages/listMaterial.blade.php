@extends('layouts.app')

@section('heading')
	<div class="page-heading">
		<h3>
			Список всех материалов
		</h3>
		<ul class="breadcrumb">
			<li>
				<a href="{{url('/')}}">Главная</a>
			</li>
			<li class="active"> Список всех материалов </li>
		</ul>
	</div>
@stop

@section('content') 
<div class="col-sm-12">
	<section class="panel">
		<header class="panel-heading">
			Работа с материаломи
			<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
			</span>
		</header>
		<div class="panel-body">
			<div class="adv-table editable-table ">
				<div class="clearfix">
					<div class="btn-group">
						<button id="editable-sample_new" class="btn btn-primary">
						Добавить материал <i class="fa fa-plus"></i>
						</button>
					</div>
				   {{--  <div class="btn-group pull-right">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right">
							<li><a href="#">Print</a></li>
							<li><a href="#">Save as PDF</a></li>
							<li><a href="#">Export to Excel</a></li>
						</ul>
					</div> --}}
				</div>
				<div class="space15"></div>
				<table class="table table-striped table-hover table-bordered" id="editable-sample">
					<thead>
						<tr>
							<th>Названия</th>
							<th>Цена</th>
							<th>Количества</th>
							<th>Изменить</th>
							<th>Удалить</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($materials as $material)
						 <tr class="">
							<td class="data-id" data-id="{{ $material->id }}">{{ $material->name }}</td>
							<td>{{ $material->price }}</td>
							<td class="center">{{ $material->count }}</td>
							<td><a class="edit" href="javascript:;">Изменить</a></td>
							<td><a class="delete" href="javascript:;">Удалить</a></td>
						</tr>
					@endforeach
					   {{--  <tr class="">
							<td>Jonathan</td>
							<td>Smith</td>
							<td class="center">Lorem ipsume</td>
							<td><a class="edit" href="javascript:;">Edit</a></td>
							<td><a class="delete" href="javascript:;">Delete</a></td>
						</tr>
						<tr class="">
							<td>Mojela</td>
							<td>Firebox</td>
							<td class="center">new user</td>
							<td><a class="edit" href="javascript:;">Edit</a></td>
							<td><a class="delete" href="javascript:;">Delete</a></td>
						</tr> --}}
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
@endsection
@section('script')
<script type="text/javascript">
function restoreRow(oTable, nRow) {
	var aData = oTable.fnGetData(nRow);
	var jqTds = $('>td', nRow);

	for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
		oTable.fnUpdate(aData[i], nRow, i, false);
	}

	oTable.fnDraw();
}

function editRow(oTable, nRow, type) {
	var aData = oTable.fnGetData(nRow);
	var jqTds = $('>td', nRow);
	jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
	jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
	jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
	jqTds[3].innerHTML = '<a class="edit" href="">Сохранить</a>';
	jqTds[4].innerHTML = '<a class="cancel" data-mode="' + type + '" href="">Отмена</a>';
}

function saveRow(oTable, nRow) {
	var jqInputs = $('input', nRow);
	oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
	oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
	oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
	oTable.fnUpdate('<a class="edit" href="">Изменить</a>', nRow, 3, false);
	oTable.fnUpdate('<a class="delete" href="">Удалить</a>', nRow, 4, false);
	oTable.fnDraw();
	return {name: jqInputs[0].value, price: jqInputs[1].value, count: jqInputs[2].value};
}

function cancelEditRow(oTable, nRow) {
	var jqInputs = $('input', nRow);
	oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
	oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
	oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
	oTable.fnUpdate('<a class="edit" href="">Изменить</a>', nRow, 3, false);
	oTable.fnDraw();
}

var oTable = $('#editable-sample').dataTable({
	"aLengthMenu": [
		[5, 15, 20, -1],
		[5, 15, 20, "All"] // change per page values here
	],
	// set the initial value
	"iDisplayLength": 5,
	"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
	"sPaginationType": "bootstrap",
	"oLanguage": {
		"sInfo": "Записи с _START_ до _END_ из _TOTAL_ записей",
		"sLengthMenu": "Показать _MENU_ записей",
		"sSearch": "Поиск:",
		"oPaginate": {
			"sPrevious": "Назад",
			"sNext": "Преред"
		}
	},
	// "aoColumnDefs": [{
	//         'bSortable': false,
	//         'aTargets': [0]
	//     }
	// ]
});

jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

var nEditing = null;
var nNewElement = false;
$('#editable-sample_new').click(function (e) {
	e.preventDefault();
	var aiNew = oTable.fnAddData(['', '', '',
			'<a class="edit" href="">Изменить</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
	]);
	var nRow = oTable.fnGetNodes(aiNew[0]);
	editRow(oTable, nRow, 'new');
	nEditing = nRow;
	nNewElement = true;
});

$('#editable-sample a.delete').live('click', function (e) {
	e.preventDefault();

	if (confirm("Вы уверены что вам нужно удалить эту запись?") == false) {
		return;
	}

	var nRow = $(this).parents('tr')[0];
	var id = $(nRow).find('.data-id').data().id;
	formData = new FormData();
	formData.append('id', id);
	app.ajaxPost('material/dell-material', formData, function(data) {
		alert("Материал был обновлен");
	});
	oTable.fnDeleteRow(nRow);	
});

$('#editable-sample a.cancel').live('click', function (e) {
	e.preventDefault();
	console.log($(this).attr("data-mode"));
	if ($(this).attr("data-mode") == "new") {
		var nRow = $(this).parents('tr')[0];
		oTable.fnDeleteRow(nRow);
		nNewElement = false;
		console.log(nRow);
	} else {
		restoreRow(oTable, nEditing);
		nEditing = null;
	}
});

$('#editable-sample a.edit').live('click', function (e) {
	e.preventDefault();

	/* Get the row as a parent of the link that was clicked on */
	var nRow = $(this).parents('tr')[0];
	if (nEditing !== null && nEditing != nRow) {
		/* Currently editing - but not this row - restore the old before continuing to edit mode */
		restoreRow(oTable, nEditing);
		editRow(oTable, nRow, 'edit');
		nEditing = nRow;
	} else if (nEditing == nRow && this.innerHTML == "Сохранить") {
		/* Editing this row and want to save it */
		if (nNewElement == true) {
			$(nRow).find('td:first').addClass('data-id');
			var Material = saveRow(oTable, nEditing);
			nEditing = null;
			formData = new FormData();
			formData.append('name', Material.name);
			formData.append('price', Material.price);
			formData.append('count', Material.count);
			app.ajaxPost('material/new-material', formData, function(data) {
				$(nRow).find('td:first').data('id',data.id);
				alert('Новый элемент сахранен');
			});
			
		}
		else {
			var Material = saveRow(oTable, nEditing);
			var id = $(nRow).find('.data-id').data().id;
			nEditing = null;
			formData = new FormData();
			formData.append('id', id);
			formData.append('name', Material.name);
			formData.append('price', Material.price);
			formData.append('count', Material.count);
			app.ajaxPost('material/edit-material', formData, function(data) {
				alert("Материал был обновлен");
			});
		}
		nNewElement = false;
	} else {
		/* No edit in progress - let's start one */
		editRow(oTable, nRow, 'edit');
		nEditing = nRow;
	}
});
</script>
@stop
