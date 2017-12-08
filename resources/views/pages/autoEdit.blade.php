@extends('layouts.app')

@section('heading')
<div class="page-heading">
    <h3>
        Изменить автомобиль
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="{{ url('/') }}"> Главная</a>
        </li>
        <li class="active">  Изменить автомобиль </li>
    </ul>
</div>
@stop

@section('content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
           Изменить автомобиль
       </header>
       <div class="panel-body">
        <div class="form">
             <form enctype="multipart/form-data" class="cmxform form-horizontal adminex-form add-auto" method="POST" action="/edit-auto/edit" novalidate="novalidate">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $auto->id }}">
                <div class="form-group ">
                <label for="fio" class="control-label col-lg-2">Фирма</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="fio" name="firm" value="{{ $auto->firm }}" type="text">
                    </div>
                </div>
                <div class="form-group ">
                <label for="fio" class="control-label col-lg-2">Марка</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="fio" value="{{ $auto->mark }}" name="mark" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="auto" class="control-label col-lg-2">Кузов</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="auto" value="{{ $auto->body }}" name="body" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Год выпуска</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="phone" value="{{ $auto->year_of_issue }}" name="year_of_issue" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Наличия лекала</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="phone" value="{{ $auto->having_curves }}" name="having_curves" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Коментарий</label>
                    <div class="col-lg-10">
                        <textarea name="comment" id="input" class="form-control" rows="3" ></textarea>
                    </div>
                </div>
                <div class="form-group ">
                <div class="col-lg-offset-2 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <iframe  width="765" height="550" frameborder="0"
                        src="{{ url('filemanager/dialog.php?type=0&fldr=auto/' .  $auto->id ) }}">
                    </iframe>
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
$('.add-auto').on('submit', function(e) {
    e.preventDefault();
    var form = $(this); 
    formData = new FormData(form.get(0));
    app.ajaxPostForm($(this).attr('action'), formData, function(data){
        window.location = '/list-auto';
    });
})
</script>
@stop