@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="mb-4">Gerenciamento de Permissões / <span class="text-muted">Editar</span></h5>
  <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="form-group row">
      <label class="col-md-4 col-form-label text-md-right">Nome</label>
      <input class="form-control col-md-6" type="text" name="name" value="{{ $role->name }}" autofocus required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
</div>
@endsection
