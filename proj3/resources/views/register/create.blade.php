<!-- Header component -->
<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Register | A Tutoring Company</title>
    </x-slot>
</x-header>

<!-- Nav Bar and Footer component -->
<x-navfoot>
    <x-slot name="content">

        <form method="POST" action="/register" style="max-width: 300px; margin:auto;">
        @csrf
        <!-- Logo -->
            <div class="mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
                <h2 class="text-center text-dark bold"> Register </h2>

            </div>

            <!-- Name field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                       value=" {{ old('name') }}" required>

                @error('name')
                <p class="text-danger"><small> {{ $message }} </small></p>
                @enderror
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

            <!-- Phone Field -->
        <!--div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                @error('phone')
            <p class="text-danger"> <small> {{ $message }} </small> </p>
                @enderror
            </div-->
            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </x-slot>
</x-navfoot>
