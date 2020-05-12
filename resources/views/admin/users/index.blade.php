@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="mb-4">Gerenciamento de Usuários</h5>
  <table class="table table-hover table-sm table-striped">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Permissão</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
        <td>
          @can('edit-users')
          <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary btn-sm float-left">Editar</button></a>
          @endcan
          @can('delete-users')
          <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-warning btn-sm">Deletar</button>
          </form>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
