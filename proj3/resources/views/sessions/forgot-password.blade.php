<!-- Header component -->
<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Reset Password | A Tutoring Company</title>
    </x-slot>
</x-header>

<!-- Nav Bar and Footer component -->
<x-navfoot>
    <x-slot name="content">

        <form method="POST" action="/forgot-password" class="mb-5 mx-auto" style="max-width: 300px">
        @csrf
        <!-- Logo -->
            <div class="mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
                <h2 class="text-center text-dark bold"> Reset Password </h2>
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

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </x-slot>
</x-navfoot>
