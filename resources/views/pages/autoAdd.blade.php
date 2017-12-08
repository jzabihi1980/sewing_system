@extends('layouts.app')

@section('heading')
<div class="page-heading">
    <h3>
        Добавить автомобиль
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="{{ url('/') }}"> Главная</a>
        </li>
        <li class="active">  Добавить автомобиль </li>
    </ul>
</div>
@stop

@section('content')

<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
           Добавить автомобиль
       </header>
       <div class="panel-body">
        <div class="form">
            <form enctype="multipart/form-data" class="cmxform form-horizontal adminex-form add-auto" method="POST" action="/add-auto/add" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="form-group ">
                <label class="control-label col-lg-2">Фирма</label>
                    <div class="col-lg-10">
                        <input class=" form-control" name="firm" type="text">
                    </div>
                </div>
                <div class="form-group ">
                <label for="fio" class="control-label col-lg-2">Марка</label>
                    <div class="col-lg-10">
                        <input class=" form-control" name="mark" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="auto" class="control-label col-lg-2">Кузов</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="auto" name="body" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Год выпуска</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="phone" name="year_of_issue" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Наличия лекала</label>
                    <div class="col-lg-10">
                        <input class="form-control " id="phone" name="having_curves" type="text">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Коментарий</label>
                    <div class="col-lg-10">
                        <textarea name="comment" id="input" class="form-control" rows="3" ></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Схема</label>
                    <div class="col-lg-10">
                        <input  type="file" name="scheme_img[]" multiple accept="image/*,image/jpeg">
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
        var alert = ''+
            '<div class="alert alert-success">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                '<strong>Сохранния!</strong>Автомабиль ' + data.name + ' был сохранен.'+
            '</div>';
        $('input').val('');
        $('.alert-masseg').append(alert);
    });
})
</script>
@stop