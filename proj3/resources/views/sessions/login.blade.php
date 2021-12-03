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

        <form method="POST" action="/login" class="mb-5 mx-auto" style="max-width: 300px">
        @csrf
        <!-- Logo -->
            <div class="mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
                <h2 class="text-center text-dark bold"> Login </h2>

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
            <div class="mx-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="m-3">
                <a type="button" class="btn btn-primary" href="/forgot-password">Reset Password</a>
            </div>
        </form>

    </x-slot>
</x-navfoot>
