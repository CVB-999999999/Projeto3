<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Login | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <form action="/action_page.php" style="max-width: 300px;margin:auto;">
            <!-- Logo and Email Field -->
            <div class="mb-3 mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <!-- Password Field-->
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <!-- Remember Me -->
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </x-slot>
</x-navfoot>
