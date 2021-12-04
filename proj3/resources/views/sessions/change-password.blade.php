<!-- Header component -->
<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Change Password | A Tutoring Company</title>
    </x-slot>
</x-header>

<!-- Nav Bar and Footer component -->
<x-navfoot>
    <x-slot name="content">

        <form method="POST" action="/change-password" class="mb-5 mx-auto" style="max-width: 300px">
        @csrf
        <!-- Logo -->
            <div class="mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
                <h2 class="text-center text-dark bold"> Change Password </h2>

            </div>

            <!-- Old Password Field -->
            <div class="mb-3">

                <label for="OldPassword" class="form-label">Old Password:</label>
                <input type="Password" class="form-control" id="OldPassword" name="OldPassword" required>

                @error('OldPassword')
                <p class="text-danger"><small> {{ $message }} </small></p>
                @enderror
            </div>

            <!-- New Password Field-->
            <div class="mb-3">
                <label for="NewPassword" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="NewPassword" name="NewPassword" required>

                @error('NewPassword')
                <p class="text-danger"><small> {{ $message }} </small></p>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </x-slot>
</x-navfoot>
