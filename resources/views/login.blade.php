@extends('master')

@section('main')

    <div class="container d-flex justify-content-center">

        <div class="login">

            <form action="{{ route('login') }}" method="post">
                @csrf

                {{ $errors->first('email') }}
                <div class="form-outline mb-4">
                    <input value="bauch.percival@example.com" type="email" name="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Endereço de Email</label>
                </div>

                {{ $errors->first('password') }}
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Senha: </label>
                </div>

                <div class="row mb-4">

                    <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

                    <div class="error_login">
                        @if(session()->has('error_login'))
                            <div class="alert alert-danger">
                                {{ session()->get('error_login') }}
                            </div>
                        @endif
                    </div>

                    <div class="text-center">
                        <p>Esqueceu sua senha? <a href="#!">Recuperar</a></p>
                    </div>

                </div>
            </form>

        </div>

    </div>

@endsection
