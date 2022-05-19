@extends('layouts.index')

@section('content')
	
	@foreach ($attachdata as $item)
		<h2>{{$item->title}}</h2>
		<p>{!! $item->content !!}</p>
	@endforeach
	
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