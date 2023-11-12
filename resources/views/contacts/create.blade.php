@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Criar Contato</span>
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar para a página inicial</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="contact">Contato</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection