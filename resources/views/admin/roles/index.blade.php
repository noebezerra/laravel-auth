@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="mb-4">Gerenciamento de Permissões</h5>
  <a href="{{ route('admin.roles.create') }}"><button class="btn btn-primary btn-sm my-1">Novo grupo</button></a>
  <table class="table table-striped table-hover table-sm">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($roles as $role)
      <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
          <a href="{{ route('admin.roles.edit', $role->id) }}"><button class="btn btn-primary btn-sm float-left">Editar</button></a>
          <form class="float-left" action="{{ route('admin.roles.destroy', $role) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <button class="btn btn-warning btn-sm" type="submit">Apagar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
