@extends('admin.app')

@section('title', 'Productos')

@section('main')
	<h1>{{ $product->name }}</h1>

	@foreach ($product->images as $image)
		<p>
			<img class="img-fluid" src="/storage/{{$image->src}}">
		</p>
	@endforeach

@endsection
