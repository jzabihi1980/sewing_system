@extends('layouts.app')

@section('content')

<div class="row states-info">
            <div class="col-md-4">
                <div class="panel red-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title"> Проданно за неделю на </span>
                                <h4> 23,232 р.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel blue-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-tag"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">  Заявок за неделю  </span>
                                <h4>2980</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel yellow-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-eye"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">  Клиентов за неделю  </span>
                                <h4>10,000</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-8">
                    <section class="panel">
                        <header class="panel-heading">
                            График продаж
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                        </header>
                        <div class="panel-body">
                            <div id="visitors-chart">
                                <div id="visitors-container" style="width: 100%;height:358px; text-align: center; margin:0 auto;">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="dir-info">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h5>Павел</h5>
                                        <span>
                                            <a href="#" class="small"> Менджер</a>
                                        </span>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span class="small">434</span>
                                            <i class="fa fa-tags"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h5>Василий</h5>
                                        <span>
                                            <a href="#" class="small"> Мастер</a>
                                        </span>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span class="small">441</span>
                                            <i class="fa fa-tags"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h5>Ирина</h5>
                                        <span>
                                            <a href="#" class="small"> Мастер</a>
                                        </span>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span class="small">124</span>
                                            <i class="fa fa-tags"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h5>Петр</h5>
                                        <span>
                                            <a href="#" class="small"> Менеджер</a>
                                        </span>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span class="small">334</span>
                                            <i class="fa fa-tags"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h5>Александер</h5>
                                        <span>
                                            <a href="#" class="small"> Менеджер</a>
                                        </span>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="dir-like" href="#">
                                            <span class="small">44</span>
                                            <i class="fa fa-tags"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
@endsection
