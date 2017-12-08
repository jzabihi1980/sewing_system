@extends('layouts.app')

@section('heading')
	<div class="page-heading">
		<h3>
			Кадры
		</h3>
		<ul class="breadcrumb">
			<li>
				<a href="{{url('/')}}">Главная</a>
			</li>
			<li class="active"> Список всех сотрудников </li>
		</ul>
	</div>
@stop

@section('content') 
<div class="col-sm-12">
	<section class="panel">
		<header class="panel-heading">
			Работа с сотрудниками
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
						Добавить сотрудника <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<div class="space15"></div>
				<table class="table table-striped table-hover table-bordered" id="editable-sample">
					<thead>
						<tr>
							<th>id</th>
							<th>Email</th>
							<th>ФИО</th>
							<th>Должнасть</th>
							<th>Сменить пароль</th>
							<th>Изменить</th>
							<th>Удалить</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($users as $user)
						 <tr class="">
						 	<td>{{ $user->id }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->name }}</td>
							<td data-status="{{ $user->status }}" class="status-user">
								{{ $userStatus[$user->status]['name'] }}
							</td>
							<td><a class="edit-password" href="javascript:;">Изменить пароль</a></td>
							<td><a class="edit" href="javascript:;">Изменить</a></td>
							<td><a class="delete" href="javascript:;">Удалить</a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<script type="text/template" id="option-template">
	<select name="" id="input" class="form-control" required="required">
	<% _.forEach(role, function(item){ %>
		<option <%= item.activ == true ? 'selected' : '' %> value="<%= item.id %>"><%= item.name %></option>
	<% }); %>
	</select>
</script>
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
var role = [
	@foreach ($userStatus as $element)
		{id: {{ $element['id'] }}, name: '{{ $element['name'] }}', activ: false},
	@endforeach
	];
function getOption(id)
{
	role[id - 1].activ = true;
	var tmpl = _.template(document.getElementById('option-template').innerHTML)({role: role});
	return tmpl;
}

function editRow(oTable, nRow, type) {
	var aData = oTable.fnGetData(nRow);
	var status = $(nRow).find('.status-user').data().status;
	var jqTds = $('>td', nRow);
	jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
	jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
	jqTds[3].innerHTML = getOption(status);
	jqTds[5].innerHTML = '<a class="edit" href="">Сохранить</a>';
	jqTds[6].innerHTML = '<a class="cancel" data-mode="' + type + '" href="">Отмена</a>';
}

function saveRow(oTable, nRow) {
	var jqInputs = $('input', nRow);
	var jqSelect = $('option:selected', nRow);
	oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
	oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
	oTable.fnUpdate(role[jqSelect.val() - 1].name, nRow, 3, false);
	oTable.fnUpdate('<a class="edit-password" href="javascript:;">Изменить пароль</a>', nRow, 4, false);
	oTable.fnUpdate('<a class="edit" href="">Изменить</a>', nRow, 5, false);
	oTable.fnUpdate('<a class="delete" href="">Удалить</a>', nRow, 6, false);
	oTable.fnDraw();
	return {email: jqInputs[0].value, fio: jqInputs[1].value, status: jqSelect.val()};
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
	var aiNew = oTable.fnAddData(['', '', '', '', '', 
		'<a class="edit" href="">Изменить</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
	]);
	var nRow = oTable.fnGetNodes(aiNew[0]);
	$(nRow).find('td:eq(3)').data().status = 1;
	$(nRow).find('td:eq(3)').addClass('status-user ');
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
	var id = $(nRow).find('td:first').text();
	formData = new FormData();
	formData.append('id', id);
	app.ajaxPost('user/dell-user', formData, function(data) {
		alert("Сотрудник был обновлен");
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
			var Material = saveRow(oTable, nEditing);
			$(nRow).find('.status-user').data().status = Material.status;
			nEditing = null;
			formData = new FormData();
			formData.append('email', Material.email);
			formData.append('name', Material.fio);
			formData.append('status', Material.status);
			app.ajaxPost('user/new-user', formData, function(data) {
				$(nRow).find('td:first').text(data.id);
				alert('Новый элемент сохранен');
			});
			
		}
		else {
			var Material = saveRow(oTable, nEditing);
			var id = $(nRow).find('td:first').text();
			$(nRow).find('.status-user').data().status = Material.status;
			nEditing = null;
			formData = new FormData();
			formData.append('id', id);
			formData.append('email', Material.email);
			formData.append('name', Material.fio);
			formData.append('status', Material.status);
			app.ajaxPost('user/edit-user', formData, function(data) {
				alert("Пользователь был обновлен");
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
