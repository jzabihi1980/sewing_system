<html>
<header>
<style type="text/css">
	table th {
		background: #FABF8F
	}
</style>
</header>
<body>
<h1>Заявка № 2222</h1>

<h3>Ткани</h3>
<table class="table">
	<thead>
		<tr>
			<th>Наименование</th>
			<th>Метерьял</th>
			<th>Цена</th>
			<th>Количества</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($materials as $material)
		<tr>
			<td>{{ $material['name'] }}</td>
			<td>{{ $material['type'] }}</td>
			<td>{{ $material['price'] }}</td>
			<td>{{ $material['count'] }}</td>
		</tr>
	@endforeach
		<tr>
			<td><strong>ИТОГО (ткань и фурнитура)</strong></td>
			<td></td>
			<td></td>
			<td>500р</td>
		</tr>
	</tbody>
</table>
<h3>Интерьер автомобиля</h3>
<table class="table">
	<thead>
		<tr>
			<th>Наименование</th>
			<th>Сложность</th>
			<th>Цена</th>
			<th>Количества</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($autos as $auto)
		<tr>
			<td>{{ $auto['name'] }}</td>
			<td>{{ $auto['type'] }}</td>
			<td>{{ $auto['price'] }}</td>
			<td>{{ $auto['count'] }}</td>
		</tr>
	@endforeach
		<tr style="background: #ccc0da;">
			<td colspan="2"><strong>ИТОГО (ткань и фурнитура)</strong></td>
			<td>500р</td>
		</tr>
	</tbody>
</table>
<h3>Дополнительные работы</h3>
<table class="table">
	<thead>
		<tr>
			<th>Наименование</th>
			<th>Сложность</th>
			<th>Цена</th>
			<th>Количества</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($work_dops as $work_dop)
		<tr>
			<td>{{ $work_dop['name'] }}</td>
			<td>{{ $work_dop['type'] }}</td>
			<td>{{ $work_dop['price'] }}</td>
			<td>{{ $work_dop['count'] }}</td>
		</tr>
	@endforeach
		<tr style="background: #ccc0da;">
			<td colspan="3"><strong>ИТОГО (ткань и фурнитура)</strong></td>
			<td>500р</td>
		</tr>
	</tbody>
</table>
</body>
<html>