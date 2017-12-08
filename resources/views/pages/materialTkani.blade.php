@extends('layouts.app')

@section('heading')
<div class="page-heading">
	<h3>
		Страница материалов-ткань
	</h3>
	<ul class="breadcrumb">
		<li>
			<a href="{{url('/')}}">Главная</a>
		</li>
		<li class="active"> Ткань </li>
	</ul>
</div>
@stop

@section('content')
<div class="col-lg-6">
	<div class="row">
		<div class="col-md-12">
			{{--         <h3>Custom panel</h3> --}}
			<div class="panel">
				<header class="panel-heading">
					Наименования материалов для пошива
					<span class="tools pull-right">
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						{{-- <a href="javascript:;" class="fa fa-times"></a> --}}
					</span>
				</header>
				<div class="panel-body" style="display: block;">
					<div id="treeview-selectable" class=""></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-6">
	<div class="row">
		<section class="panel">
			<header class="panel-heading custom-tab ">
				<ul class="nav nav-tabs">
					{{-- <li class="active">
						<a href="#home" data-toggle="tab">Список элиментов</a>
					</li> --}}
					<li class="active">
						<a href="#about" data-toggle="tab">Добавить категорию</a>
					</li>
				</ul>
			</header>
			<div class="panel-body">
				<div class="tab-content">
{{-- 					<div class="tab-pane active" id="home">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Названия</th>
											<th>Цена</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr><th colspan="3">Выберите одну из категорий</th></tr>
									</tbody>
								</table>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="row">
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<input type="text" name="" id="inputName" class="form-control" value="" required="required" pattern="" title="">
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<input type="text" name="" id="inputPrice" class="form-control" value="" required="required" pattern="" title="">
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<button id="add-material" class="btn btn-primary">
											Добавить <i class="fa fa-plus"></i>
										</button>
									</div>
								</div>

							</div>
						</div>
					</div> --}}
					<div class="tab-pane active" id="about">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form">
								<div class="form-group" >
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<label for="exampleInputEmail1">Действия над категорией</label> 
									</div>
									<div style="margin-bottom: 20px" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<button id="del-folder-material-tkani" class="btn btn-primary">Удалить</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<label for="inputNameFolderMaterialTkani">Изменить категорию</label>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
										<input type="text" class="form-control" id="inputNameFolderMaterialTkani" placeholder="Названия категории">
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<button id="edit-folder-material-tkani" class="btn btn-primary">
											Изменить
										</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<label for="exampleInputEmail1">Добавить вложенную категорию</label>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
									<input type="email" class="form-control" id="inputFolderMaterialTkani" placeholder="Названия категории">
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<button id="add-folder-material-tkani" class="btn btn-primary">
											Добавить
										</button>
									</div>
								</div>
							</div>  
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">

	var defaultData = <?php echo(string)($materialsCats);?>; 

	// function recDataRows(data) {
	// 	var html = '';
	// 	for (var i = 0; i < data.length; i++) {
	// 		var tmp = '';
	// 		tmp  = '<tr>' +
	// 		'<td>' + data[i].name + '</td>' +
	// 		'<td>' + data[i].price + '</td>' +
	// 		'<td>' + data[i].price + '</td>' +
	// 		'</tr>';
	// 		html += tmp;
	// 	}
	// 	$('.table-striped').find('tbody').append(html);
	// }
	var application = {
		id: 0
	};
	// $('#add-material').on('click', function(e){
	// 	var inputName = $('#inputName').val();
	// 	var inputPrice = $('#inputPrice').val();
	// 	var formData = new FormData();
	// 	formData.append('sid', application.id);
	// 	formData.append('name', inputName);
	// 	formData.append('price', inputPrice);
	// 	app.ajaxPost('material-tkani/add-material', formData, function(data){
	// 		$('.table-striped').find('tbody').html('');
	// 		recDataRows([data]);
	// 	});
	// });
	$('#add-folder-material-tkani').on('click', function(e){
		var inputFolderMaterialTkani = $('#inputFolderMaterialTkani').val();
		var formData = new FormData();
		formData.append('name', inputFolderMaterialTkani);
		formData.append('sid', application.id);
		app.ajaxPost('material-tkani/add-folder-material-tkani', formData, function(data){
		    location.reload();
		});
	});
	$('#edit-folder-material-tkani').on('click', function(e) {
	    var formData = new FormData();
	    formData.append('id', application.id);
	    formData.append('name', $('#inputNameFolderMaterialTkani').val());
	    app.ajaxPost('material-tkani/edit-folder-material-tkani', formData, function(data){
	       location.reload(); 
	    });
	})
	var initSelectableTree = function() {
		return $('#treeview-selectable').treeview({
			data: defaultData,
			multiSelect: $('#chk-select-multi').is(':checked'),
			onNodeSelected: function(event, node) {
				var formData = new FormData();
				formData.append('id', node.href)
				application.id = node.href;
				// app.ajaxPost('material-tkani/get-material-tkani',formData, function (data) {
				// 	$('#inputNameFolderMaterialTkani').val(node.text);
				// 	$('.table-striped').find('tbody').html('');
				// 	if (data.length == 0)
				// 		$('.table-striped').find('tbody').append('Нет данных');
				// 	else 
				// 		recDataRows(data);
				// })
			},
			onNodeUnselected: function (event, node) {
				$('#selectable-output').prepend('<p>' + node.text + ' was unselected</p>');
			}
		});
	};
	var $selectableTree = initSelectableTree();

	var findSelectableNodes = function() {
		return $selectableTree.treeview('search', [ $('#input-select-node').val(), { ignoreCase: false, exactMatch: false } ]);
	};
	var selectableNodes = findSelectableNodes();

	$('#chk-select-multi:checkbox').on('change', function () {
		console.log('multi-select change');
		$selectableTree = initSelectableTree();
		selectableNodes = findSelectableNodes();          
	});

// Select/unselect/toggle nodes
// $('#input-select-node').on('keyup', function (e) {
//   selectableNodes = findSelectableNodes();
//   $('.select-node').prop('disabled', !(selectableNodes.length >= 1));
// });

// $('#btn-select-node.select-node').on('click', function (e) {
//   $selectableTree.treeview('selectNode', [ selectableNodes, { silent: $('#chk-select-silent').is(':checked') }]);
// });

// $('#btn-unselect-node.select-node').on('click', function (e) {
//   $selectableTree.treeview('unselectNode', [ selectableNodes, { silent: $('#chk-select-silent').is(':checked') }]);
// });

// $('#btn-toggle-selected.select-node').on('click', function (e) {
//   $selectableTree.treeview('toggleNodeSelected', [ selectableNodes, { silent: $('#chk-select-silent').is(':checked') }]);
// });
</script>
@stop
