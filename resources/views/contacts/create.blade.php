@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-user-plus"></i> Criar Contato</span>
                    @include('components.btback')
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="contact">Contato</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" required value="{{ old('contact') }}">
                            @error('contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Limpar formulário">
                                <i class="fas fa-undo"></i> Resetar
                            </button>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Salvar novo contato">
                                <i class="fas fa-cloud-upload-alt"></i> Adicionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection