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
        <div class="container">
            <div class="card m-md-5 p-md-5 p-3 m-1">
                <form class="mb-5 mx-auto" method="POST" action="/admin/register" style="width: 100%">
                @csrf
                <!-- Logo -->
                    <div class="mt-3 d-flex justify-content-center">
                        <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-height: 4rem">
                        <h1 class="text-center text-dark bold"> Register a User</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">

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

                            <!-- Phone Field -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="tel" class="form-control" name="phone" id="phone">
                                @error('phone')
                                <p class="text-danger"><small> {{ $message }} </small></p>
                                @enderror
                            </div>

                            <!-- Type field -->
                            <div class="mb-3">
                                <label for="type" class="form-label">User Type:</label>
                                <select name="type" class="form-select" aria-label="Default select example" id="type">
                                    <option selected>Chose an option:</option>
                                    <option value="0">Student</option>
                                    <option value="1">Tutor</option>
                                </select>
                                @error('phone')
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
