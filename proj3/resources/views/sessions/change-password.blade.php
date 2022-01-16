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
        <div class="container">
            <div class="card m-md-5 p-md-5 p-3 m-1">
                <form method="POST" action="/change-password" class="mb-5 mx-auto" style="width: 100%">
                @csrf
                <!-- Logo -->
                    <div class="my-3 d-flex justify-content-center">
                        <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-height: 4rem">
                        <h1 class="text-center text-dark bold"> Change Password </h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">

                            <!-- Old Password Field -->
                            <div class="mb-3">

                                <label for="OldPassword" class="form-label">Old Password:</label>
                                <input type="Password" class="form-control" id="OldPassword" name="OldPassword"
                                       required>

                                @error('OldPassword')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- New Password Field-->
                            <div class="mb-3">
                                <label for="NewPassword" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="NewPassword" name="NewPassword"
                                       required>

                                @error('NewPassword')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-navfoot>
