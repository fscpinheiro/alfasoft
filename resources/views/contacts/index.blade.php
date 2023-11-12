@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Contatos</span>
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Criar novo contato</a>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('contacts.index') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar contatos" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                <a href="{{ route('contacts.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center my-3">
                        {{ $contacts->links() }}
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Contato</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->contact }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <div class="d-flex ms-auto">
                                            <a href="{{ route('contacts.show', $contact) }}" class="btn btn-link btn-sm" aria-label="Visualizar" data-bs-original-title="Visualizar">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-link btn-sm" aria-label="Editar" data-bs-original-title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('contacts.confirmDestroy', $contact) }}" class="btn btn-link text-danger btn-sm" aria-label="Deletar" data-bs-original-title="Deletar">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center my-3">
                        {{ $contacts->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection