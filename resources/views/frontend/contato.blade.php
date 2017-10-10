@extends('layouts.app')

@section('content')
<h3 class="text-center">Enviar Mensagem</h3>

<div class="content">
		
		<form action="contato-enviar" method="post">
			{!! csrf_field() !!}
			<div class="form-group">
				<input type="text"  class="name form-control" name="name" placeholder="Nome" required>
			</div>
			<div class="form-group">
				<input type="email"  class="email form-control" name="email" placeholder="E-mail" required>
			</div>
			<div class="form-group">
				<input type="text"  class="assunto form-control" name="assunto" placeholder="Assunto" required>
			</div>
			<div class="form-group">
				<textarea class=" form-control" name="mensagem" placeholder="Digite a mensagem..." required></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-block" value="Enviar Mensagem">
			</div>
		</form>
</div>

@endsection