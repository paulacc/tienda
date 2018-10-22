@extends('admin.app')

@section('title', 'Productos')

@section('main')

	@include('admin.partials.errors')

	<form action="/admin/products/{{$product->id}}" method="post" enctype="multipart/form-data">
		@method('PUT')
		@csrf

		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" class="form-control" value="{{$product->name}}" />
		</div>

		<div class="form-group">
			<label for="price">Precio</label>
			<input type="text" name="price" id="price" class="form-control" value="{{$product->price}}" />
		</div>

	
		<div class="form-group">
			<label for="category_id">Categoría</label>
			<select class="form-control" id="category_id" name="category_id">
				@foreach ($categories as $category)
	@php
		$selected = ($category->id == $product->category_id) ? 'selected' : ''
	@endphp
					<option {{$selected}} value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="">Tags</label>

			@foreach ($tags->chunk(2) as $chunk)
				<div class="row">
					@foreach ($chunk as $tag)
	@php
		$tagsIds = $product->tags->pluck('id')->toArray();
		$checked = (in_array($tag->id, $tagsIds)) ? 'checked' : ''
	@endphp
						<div class="col-md-6">
							<label for="tag{{$tag->id}}">{{$tag->name}}</label>
							<input {{$checked}} type="checkbox" name="tags[]" id="tag{{$tag->id}}" value="{{$tag->id}}">
						</div>
					@endforeach
				</div>
			@endforeach
		</div>

		<div class="form-group">
			<label for="images" class="btn btn-success">Imágenes</label>
			<input type="file" name="images[]" id="images" multiple style="display: none">
		</div>

		<div class="form-group">
			<button class="btn btn-primary" name="enviador">Enviar</button>
		</div>

		<input type="hidden" name="id" value="{{$product->id}}">

	</form>
@endsection
