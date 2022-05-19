@extends('layouts.index')

@section('content')

	<h1>Форма</h1>

	@if ($flag == 0)
		@include('console.form')
	@endif
	@if ($flag == 1)
		@include('console.formAddPage')
	@endif
	@if ($flag == 2)
		@include('console.formAddSection')
	@endif


	@if (isset($attachdata) && count($attachdata))
		<hr>					
		<h2>Прикрепленные записи</h2>						
		@foreach ($attachdata as $item)
			@if ($item-> menu < 1)
				{{ $item->title }} (
					<a href="/console/update/{{ $item->id }}">Изменить</a> /  
					<a href="/admin/delete/{{ $item->id }}">Удалить</a>) </p>
				@endif
		@endforeach
		<hr>					
		<h2>Прикрепленные записи</h2>						
		@foreach ($attachdata as $item)
		@if ($item-> menu > 0)
			{{ $item->title }} (
				<a href="/console/update/{{ $item->id }}">Изменить</a> /  
				<a href="/admin/delete/{{ $item->id }}">Удалить</a>) </p>
			@endif
		@endforeach
		<hr>


	@endif 

	@if (isset($data))
		<form class="console" action="/console/add" method="post">
			<input type="hidden" name="parent" value="{{ $data->id }}"><p>	
			<input class="btn" type="submit" value="Прикрепить новую запись">
			@csrf
		</form>
	@endif
	@if (isset($data))
		<form class="console" action="/console/addSection" method="post">
			<input type="hidden" name="parent" value="{{ $data->id }}"><p>	
			<input class="btn" type="submit" value="Прикрепить новый раздел">
			@csrf
		</form>
	@endif

@endsection

@section('navig')

<nav>
<ul class="topmenu">

@foreach ($menu as $item)

	<li><a href="/{{$item->name}}">{{$item->title}}</a>
		<ul class="submenu">
		@foreach($attachmenu as $atdata)
			@if ($atdata->parent == $item->id && $atdata->menu > 0)
				<li><a href="/{{$item->name}}/{{$atdata->name}}">{{$atdata->title}}</a></li>
			@endif
		@endforeach
		</ul>
	</li>
@endforeach

</ul>
</nav>

@endsection
