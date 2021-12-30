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
            <div class="card border m-3 p-3 mx-auto">
                <div class="row">
                    <div class="d-none d-md-block col-md-6 p-2">
                        <img src="/images/owl.svg" alt="ATC Logo">
                        <h1 class="text-center" style="color: #b3b3b3"><strong> A Tutoring Company </strong></h1>
                    </div>
                    <div class="col-md-6 p-md-5 p-3">
                        <form method="POST" action="/change-password" class="mb-5 mx-auto" style="max-width: 300px">
                        @csrf
                        <!-- Logo -->
                            <div class="mt-3">
                                <h2 class="text-start text-dark bold pb-2"> Change Password </h2>

                            </div>

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
                            <div class="my-3 d-grid">
                                <button type="submit" class="btn btn-primary py-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-navfoot>
