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
        <div class="container">
            <div class="card border m-3 p-3 mx-auto">
                <div class="row">
                    <div class="d-none d-md-block col-md-6 p-2">
                        <img src="/images/owl.svg" alt="ATC Logo">
                        <h1 class="text-center" style="color: #b3b3b3"><strong> A Tutoring Company </strong></h1>
                    </div>
                    <div class="col-md-6 p-md-5 p-3">
                        <form method="POST" action="/reset-password" class="mb-5 mx-auto">
                        @csrf
                        <!-- Logo -->
                            <div class="mt-3">
                                <h2 class="text-start text-dark bold pb-2"> Reset Password </h2>
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

                            <!-- Token Field-->
                            <div class="mb-3">
                                <label for="token" class="form-label">Token:</label>
                                <input type="text" class="form-control" id="token" name="token"
                                       value=" {{ old('token') }}" required>

                                @error('token')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- Password Field-->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       required>

                                @error('password')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-navfoot>
