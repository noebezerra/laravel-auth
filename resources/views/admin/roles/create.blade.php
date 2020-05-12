@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="mb-4">Gerenciamento de Permissões / <span class="text-muted">Criação de grupo</span></h5>
  <form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="form-group row">
      <label class="col-md-4 col-form-label text-md-right">Nome</label>
      <input class="form-control col-md-6" type="text" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
  </form>
</div>
@endsection
