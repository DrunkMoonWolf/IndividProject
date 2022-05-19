@extends('layouts.index')

@section('content')
	
	<h1>Консоль управления</h1>
	<h2>Редактирование данных</h2>
	
	@foreach ($data as $item)
		@if ($item->title != "Консоль")
		<h4>
			{{ $item->title }} <a class="redact" href="/console/update/{{ $item->id }}">Редактировать</a> 
			<?php
			$count = DB::table("animals")->where("parent","=",$item->id)->where("menu",">","0")->select("id")->get()->count();
			?>
			@if ($count == 0)
				<a href="/admin/delete/{{ $item->id }}"> / Удалить</a>
			@endif
		</h4>
		@endif
	@endforeach

	<form class="console" action="/console/addpage" method="post">
		<input class="btn" type="submit" value="Добавить новую страницу">
		@csrf
	</form>

@endsection

@section('navig')

<nav>
<ul class="topmenu">

@foreach ($data as $item)

	<li><a href="/{{$item->name}}">{{$item->title}}</a>
		<ul class="submenu">
		@foreach($attachdata as $atdata)
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