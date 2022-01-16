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

        {{ Breadcrumbs::render('tutorCreatePost', $regId) }}

        <div class="container">
            <div class="card m-md-5 p-md-5 p-3 m-1 mt-md-2">
                <form class="mx-auto" method="POST" action="/tutor/createpost/save"
                      enctype="multipart/form-data" style="width: 100%">
                @csrf
                <!-- Logo -->
                    <div class="mt-3 d-flex justify-content-center">
                        <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-height: 4rem">
                        <h1 class="text-center text-dark bold"> Create Post for
                            Student {{ $student->name }}</h1>
                    </div>
                    <hr class="border border-primary">
                    <div class="row">
                        <div class="col-md-6 mx-auto">

                            <!-- Title field -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <!-- Due Date field -->
                            <div class="mb-3">
                                <label for="date" class="form-label">Due Date:</label>
                                <input type="datetime-local" class="form-control" id="date" name="date" required>
                            </div>

                            <!-- file -->
                            <div class="mb-3">
                                <label for="arquivo" class="form-label">File:</label>
                                <input class="form-control" type="file" id="arquivo" name="arquivo" required>
                            </div>

                            <!-- Description Field -->
                            <div class="mb-3">
                                <label for="body" class="form-label">Description:</label>
                                <textarea type="text" class="form-control" id="body" name="body" rows="5"
                                          required> </textarea>
                            </div>

                            <!-- Submit -->
                            <input type="hidden" value="{{ $regId }}" name="registration_id">

                            <div class="text-center">
                                <a type="submit" href="/tutor/assignment/{{ $regId }}" class="btn btn-primary">
                                    <i class="bi bi-x-lg"></i> Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-upload"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-navfoot>
