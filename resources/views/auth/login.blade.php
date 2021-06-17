@extends('layouts.app')

@section('content')

                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf



                                <input placeholder="Эл. почта" id="email" type="email" class="form-control  style-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input placeholder="Пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror style-input" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>

                        @if($errors->any())
                            <div class="alert">
                                <ul>
                                    @foreach($errors ->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Войти') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif

                    </form>
                    <div class="sign-up-redirect">
                         <span class="txt1">
							Всё ещё нет аккаунта?
						</span>
                        <a class="txt2" href="{{route('register')}}">
                            Зарегистрироваться
                        </a>
                    </div>
                </div>
@endsection
