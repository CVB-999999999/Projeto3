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
            <div class="card border m-3 p-3 mx-auto">
                <div class="row">
                    <div class="d-none d-md-block col-md-6 p-2">
                        <img src="/images/owl.svg" alt="ATC Logo">
                        <h1 class="text-center" style="color: #b3b3b3"><strong> A Tutoring Company </strong></h1>
                    </div>
                    <div class="col-md-6 p-md-5 p-3">
                        <form method="POST" action="/login">
                        @csrf
                        <!-- Logo -->
                            <div class="mt-3">
                                <h2 class="text-start text-dark bold pb-2"> Log in </h2>
                            </div>

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
                            <div class="my-3 d-grid">
                                <button type="submit" class="btn btn-primary py-2">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </x-slot>
</x-navfoot>
