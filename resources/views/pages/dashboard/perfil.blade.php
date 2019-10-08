@extends('layouts.default')

@include('elements.modules.modulo', ['modulo' => 'dashboard'])

@push('scripts')
    <script src="{{ asset('js/crud.js') }}"></script>
@endpush

@section('buttons')
    <div class="float-buttons">
        @include('elements.buttons.back', [ 'link' => route('dashboard.index') ] )
        @include('elements.buttons.update', [ 'link' => route('dashboard.update', $result->id) ] )
    </div>
@endsection

@section('breadcrumbs')
    @include('breadcrumbs.dashboard.perfil')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">

                <form id="form-crud" method="post" action="{{ route('dashboard.update', $result->id ) }}" >
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="id" value="{{ $result->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome *</label>
                                <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ $result->nome }}">
                                @if ($errors->has('nome'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Login</label>
                                <p>{{ $result->login }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ $result->email }}">
                                @if ($errors->has('email'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Senha - <small>Deixe em Branco para manter a senha atual</small></label>
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Senha">
                                @if ($errors->has('password'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection