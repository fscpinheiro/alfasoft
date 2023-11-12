@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Excluir Contato</span>
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar para a página inicial</a>
                </div>

                <div class="card-body">
                    <p>Tem certeza de que deseja excluir o contato {{ $contact->name }}?</p>

                    <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Excluir</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection