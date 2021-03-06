@extends ('layout.principal')

@section('conteudo')

	<h1>Listagem de produtos</h1>

		@if (empty($produtos))
			<div class="alert alert-danger">
				você não tem nenhum produto cadastrado.
			</div>
		@else


			<table class="table table-striped table-bordered table-hover">	
			{{-- {{ dd( $produtos ) }} --}}
				@foreach ($produtos as $p)
					<tr class="{{$p->quantidade<=1 ? 'danger': ''}}">
						<td>{{$p->nome}}</td>
						<td>{{$p->valor}}</td>
						<td>
							@if (is_array($p->descricao) || is_object($p->descricao))
								@foreach ($p->descricao as $key => $value)
									{{ $key }} -- {{ $value }}
								@endforeach
							@else
								{{ $p->descricao }}
							@endif
							
						</td>
						<td>{{$p->quantidade}}</td>
						<td><a href="/produtos/mostra/{{$p->id}}"><span class="glyphicon glyphicon-search"></span></a></td>
						<td><a href="{{action('ProdutoController@remove', $p->id)}}"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td><a href="{{action('ProdutoController@editar', $p->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
								
					</tr>
				@endforeach	
			</table>

		@endif

		<h4><span class="label label-danger pull-right">Um ou menos itens no estoque</span></h4>
		<br>
		</br>
	@if(old('valor'))
	<div class="alert alert-success">
		<strong>Sucesso!</strong> O produto {{old('nome')}} foi editado
	</div>
	@elseif(old('nome'))
	<div class="alert alert-success">
		<strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado
	</div>
	@endif
@stop