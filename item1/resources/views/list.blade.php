@extends('app')

@section('content')

    <div class="container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h2>Lista de usuarios</h2>
                    <p>Lista usuários de Existentes. </p>
                </div>
                <div class="col-sm">
                    <a class="btn btn-success"  href=" {{ route('user.create') }}">Cadastrar</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Cep</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->cep }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a class="btn btn-success"  href=" {{ route('user.edit', $user->id) }} ">Editar</a></td>
                            <td>
                                <form style="display: inline" action="{{ route('user.destroy', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Tem certeza que deseja remover o usuário?')">Deletar</button>
                                </form></td>
                        </tr>
                    @empty
                        <div class="alert alert-warning" role="alert">
                            Nenhum usuáro cadastrado
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

