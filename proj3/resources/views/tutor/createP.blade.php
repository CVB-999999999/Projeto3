<!-- Header component -->
<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Create Post | A Tutoring Company</title>
    </x-slot>
</x-header>

<!-- Nav Bar and Footer component -->
<x-navfoot>
    <x-slot name="content">
        <div class="container mb-5">
            <form class="mx-auto" method="POST" action="/tutor/createpost/save" style="max-width: 80vw; width: 25rem"
                  enctype="multipart/form-data">
            @csrf
            <!-- Logo -->
                <div class="mt-3 text-center">
                    <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-width: 20rem">
                    <h2 class="text-center text-dark bold"> Create Post for Student {{ $student->name }} </h2>
                </div>

                <!-- Title field -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <!-- Due Date field -->
                <div class="mb-3">
                    <label for="date" class="form-label">Due Date:</label>
                    <input type="datetime-local" class="form-control" id="date" name="date">
                </div>

                <!-- file -->
                <div class="mb-3">
                    <label for="arquivo" class="form-label">File:</label>
                    <input class="form-control" type="file" id="arquivo" name="arquivo">
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="body" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="body" name="body">
                </div>

                <!-- Submit -->
                <input type="hidden" value="{{ $regId }}" name="registration_id">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </x-slot>
</x-navfoot>
