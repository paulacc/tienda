@extends('admin.app')

@section('title', 'Productos')

@section('main')

	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
	@endif

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categoría</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
				<tr>
					<td>{{ $product->name }}</td>
					<td>{{ $product->category->name }}</td>
					<td>{{ $product->price }}</td>
					<td>
						<a class="btn btn-primary" href="/admin/products/{{$product->id}}/edit">
							<span class="fa fa-pencil"></span>
						</a>
						<form action="/admin/products/{{$product->id}}" method="post">
							@method('DELETE')
							@csrf
							<button class="btn btn-danger">
								<span class="fa fa-trash"></span>
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $products->links() }}
@endsection
