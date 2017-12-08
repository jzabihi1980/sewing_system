var app = (function(){
	var domain = document.domain;
	var csrf_token = window.Laravel.csrfToken;
	function table(IDorClass) {
		this.table = null;
		this.ruDataTable = function() {
			return {
				"sProcessing":   "Подождите...",
				"sLengthMenu":   "Показать _MENU_ записей",
				"sZeroRecords":  "Записи отсутствуют.",
				"sInfo":         "Записи с _START_ до _END_ из _TOTAL_ записей",
				"sInfoEmpty":    "Записи с 0 до 0 из 0 записей",
				"sInfoFiltered": "(отфильтровано из _MAX_ записей)",
				"sInfoPostFix":  "",
				"sSearch":       "Поиск:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst": "Первая",
					"sPrevious": "Предыдущая",
					"sNext": "Следующая",
					"sLast": "Последняя"
				}
			}
		},
		this.dataTableIni = function(name) {
			return $(name).DataTable({
				//"aaSorting": [[ 4, "desc" ]],
				oLanguage: this.ruDataTable()
			});
		},
		this.deleteRow = function(element) {
			console.log(this.table);
			this.table
				.row($(element))
				.remove()
				.draw();
		},
		this.init = function(){
			this.table = this.dataTableIni(IDorClass);
		}
		this.init();
	}
	function ajax(url, data,callBack) {
		$.ajax({
			url: 'http://' + domain + '/' + url,
			type: 'POST',   
			contentType: false, 
			processData: false,
			data: data
		}).done(function(data){
			callBack(data);
		}).fail(function(){

		});
	};

function ajaxPost(url, data,callBack) {
	data.append('_token', csrf_token);
	ajax(url, data,callBack);
};

return {
	ajaxPostForm: ajax,
	ajaxPost: ajaxPost,
	table: table
}
})();