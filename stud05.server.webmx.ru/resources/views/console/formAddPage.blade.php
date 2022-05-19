
<form class="console" action="/admin/modification" method="post" enctype="multipart/form-data">
	
	<input type="hidden" value="0" name="parent"><p>
	<input type="hidden" value="1" name="menu"><p>
	<input type="text" placeholder="Название" name="title" value="{{ isset($data->title)? $data->title : '' }}"><p>	
	<input type="text" placeholder="Имя" name="name" value="{{ isset($data->name)? $data->name : '' }}"><p>
	<input type="hidden" name="id" value="{{ isset($data->id)? $data->id : '' }}"><p>


	<input class="btn" type="submit" value="{{ isset($data)? 'Изменить' : 'Добавить' }}"><p>	
	@csrf
	
</form>