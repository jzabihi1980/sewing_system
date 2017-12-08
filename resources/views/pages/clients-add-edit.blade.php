@extends('layouts.app')

@section('heading')
<div class="page-heading">
	<h3>
		Добавить клиента
	</h3>
	<ul class="breadcrumb">
		<li>
			<a href="{{ url('/') }}"> Главная</a>
		</li>
		<li class="active">  Добавить клиента </li>
	</ul>
</div>
@stop

@section('content')

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
		   Добавить клиента
	   </header>
	   <div class="panel-body">
		<div class="form">
			<form class="cmxform form-horizontal adminex-form" method="POST" action="{{ $action }}" novalidate="novalidate">
				{{ csrf_field() }}
				<div class="form-group ">
				<label class="control-label col-lg-2">ФИО клиента</label>
					<div class="col-lg-10">
						<input class=" form-control" name="fio" type="text">
					</div>
				</div>
				<div class="form-group ">
					<label for="auto" class="control-label col-lg-2">Авто клиента</label>
					<div class="col-lg-10">
						<select required id="single" name="auto_id" class="js-example-basic-single form-control select2-single">
							<option></option>
							@foreach ($autos as $auto)
							<option value="{{ $auto['id'] }}">
							{{ $auto['firm'] }} 
							{{ $auto['mark'] }} 
							{{ $auto['year_of_issue'] }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group ">
					<label for="phone" class="control-label col-lg-2">Телефон заказчика</label>
					<div class="col-lg-10">
						<input type="text" name="phone" data-mask="+7 (999) 999-99-99" class="form-control">
						<span class="help-inline">+7 (999) 999-99-99</span>
					</div>
				</div>
				<div class="form-group ">
					<label for="phone" class="control-label col-lg-2">Город</label>
					<div class="col-lg-10">
						<input class="form-control " name="city" type="text">
					</div>
				</div>
				<div class="form-group ">
					<label for="phone" class="control-label col-lg-2">Контактный телефон-1</label>
					<div class="col-lg-4">
						<input type="text" name="contact-phone-1" data-mask="+7 (999) 999-99-99" class="form-control">
						<span class="help-inline">+7 (999) 999-99-99</span>
					</div>
					 <div class="col-lg-6">
						<input class="form-control" name="contact-fio-1" placeholder="ФИО Контактного лица" id="phone" name="phone" type="text">
					</div>
				</div>
				<div class="form-group ">
					<label for="phone" class="control-label col-lg-2">Контактный телефон-2</label>
					<div class="col-lg-4">
						<input type="text" name="contact-phone-2" data-mask="+7 (999) 999-99-99" class="form-control">
						<span class="help-inline">+7 (999) 999-99-99</span>
					</div>
					 <div class="col-lg-6">
						<input class="form-control" name="contact-fio-2" placeholder="ФИО Контактного лица" id="phone" name="phone" type="text">
					</div>
				</div>
				<div class="form-group ">
					<label for="phone" class="control-label col-lg-2">Комментарий</label>
					<div class="col-lg-10">
						<textarea rows="6" name="comment" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button class="btn btn-primary" type="submit">Сохранить</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(".js-example-basic-single").select2({
		theme: "bootstrap",
		placeholder: "Список клиентов",
		width: null,
		containerCssClass: ':all:'
	});
</script>
@stop