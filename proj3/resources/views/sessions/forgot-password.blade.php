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
            <div class="card border m-3 mx-auto">
                <div class="row">
                    <div class="col-md-6 p-lg-5 p-3 mx-auto">
                        <form method="POST" action="/forgot-password" class="mx-auto">
                        @csrf
                        <!-- Logo -->
                            <div>
                                <img src="/images/owl.svg" alt="ATC Logo">
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
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-navfoot>
