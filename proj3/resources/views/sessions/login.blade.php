<!-- Header component -->
<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Login | A Tutoring Company</title>
    </x-slot>
</x-header>

<!-- Nav Bar and Footer component -->
<x-navfoot>
    <x-slot name="content">
        <div class="container">
            <div class="card m-md-5 p-md-5 p-3 m-1">
                <form method="POST" action="/login">
                @csrf
                <!-- Logo -->
                    <div class="my-3 d-flex justify-content-center">
                        <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-height: 4rem">
                        <h1 class="text-center text-dark bold"> Log in </h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">

                            <!-- Email Field -->
                            <div class="mb-3">

                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value=" {{ old('email') }}" required>

                                @error('email')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- Password Field-->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       required>

                                @error('password')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="form-check d-flex justify-content-between">
                                <span>
                                    <input class="form-check-input" type="checkbox" value=true name="remember"
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </span>
                                <span class="text-end">
                                    <a type="button" class="text-muted"
                                       href="/forgot-password">Forgot your password?</a>
                                </span>

                            </div>
                            {{-- Submit BTN --}}
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5">Access Dashboard</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-navfoot>
