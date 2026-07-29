@extends('layouts.guest')

@section('content')

<div class="login-page">

    <div class="login-overlay">

        <div class="login-card">

            <img src="{{ asset('images/logo.png') }}" class="login-logo">

            <h2>TerraBuild ERP</h2>

            <p>Construction Management Platform</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        required>

                </div>

                <div class="mb-4">

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Password"
                        required>

                </div>

                <button class="btn btn-warning w-100">

                    Sign In

                </button>

            </form>

        </div>

    </div>

</div>

@endsection