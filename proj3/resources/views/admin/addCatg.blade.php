<!-- Header component -->
<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Create Discipline | A Tutoring Company</title>
    </x-slot>
</x-header>

<!-- Nav Bar and Footer component -->
<x-navfoot>
    <x-slot name="content">

        <form method="POST" class="mx-auto mb-5" action="/admin/create/discipline" style="max-width: 25rem">
        @csrf
        <!-- Logo -->
            <div class="mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill">
                <h2 class="text-center text-dark bold"> Create Discipline</h2>
            </div>

            <!-- Name field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <!-- Disc Code Field -->
            <div class="mb-3">
                <label for="slug" class="form-label">Discipline Code:</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>


            <!-- Grade Field -->
            <div class="mb-3">
                <label for="grade" class="form-label">Grade:</label>
                <input type="text" class="form-control" id="grade" name="grade">
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </x-slot>
</x-navfoot>
