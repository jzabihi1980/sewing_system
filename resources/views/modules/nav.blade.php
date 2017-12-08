<ul class="nav nav-pills nav-stacked custom-nav">
	<li class="active">
		<a href="{{ url('/')}}">
			<i class="fa fa-home"></i> <span>Главная</span>
		</a>
	</li>

	<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Работа с заказом</span></a>
		<ul class="sub-menu-list">
			<li><a href="{{ url('/add-order')}}"> Добавить заказ</a></li>
			<li><a href="{{ url('/orders')}}"> Все заказы</a></li>

		</ul>
	</li>
	<li class="menu-list"><a href=""><i class="fa fa-address-card-o"></i> <span>Клиенты</span></a>
		<ul class="sub-menu-list">
			<li><a href="{{ action('ClientController@addPage') }}"> Добавить клиента</a></li>
			<li><a href="{{ url('/clients')}}"> Все клиенты</a></li>
		</ul>
	</li>
	<li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>Отчет</span></a>
		<ul class="sub-menu-list">
			<li><a href="{{ url('/add-client')}}">Зарплата сотрудникам</a></li>
		</ul>
	</li>
	<li class="menu-list"><a href=""><i class="fa fa-cubes"></i> <span>Склад материалов</span></a>
		<ul class="sub-menu-list">
			<li><a href="{{ url('/list-material')}}">Список материалов</a></li>
			<li><a href="{{ url('/clients')}}">Приход материалов</a></li>
		</ul>
	</li>
	<li class="menu-list"><a href=""><i class="fa fa-car"></i><span>База автомобилей</span></a>
		<ul class="sub-menu-list">  
			<li><a href="{{ url('/add-auto')}}">Добавить автомобиль</a></li>
			<li><a href="{{ url('/list-auto')}}">Список автомобилей</a></li>
		</ul>
	</li>
	{{-- <li ><a href="{{ url('/list-avto')}}"><i class="fa fa-car"></i><span>База автомобилей</span></a> --}}
	<li ><a href="{{ url('/list-user')}}"><i class="fa fa-users"></i><span>Работа с штатом</span></a>
	<li ><a href="{{ url('/material-tkani')}}"><i class="fa fa-cogs"></i><span>Материалы-Ткани</span></a>
	</li>
	<li><a href="{{ url('/auto')}}"><i class="fa fa-tasks"></i> <span>Интерьер авто</span></a></li>
	<li><a href="{{ url('/werk')}}"><i class="fa fa-cogs"></i><span>Доп. работы</span></a></li>
</ul>