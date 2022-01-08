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
        <div class="container">
            <div class="card border m-3 mx-auto">
                <div class="row">
                    <div class="col-md-6 p-lg-4 p-3 mx-auto">
                        <form class="mx-auto" method="POST" action="/tutor/createpost/save"
                              enctype="multipart/form-data">
                        @csrf
                        <!-- Logo -->
                            <div class="text-center">
                                <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill"
                                     style="max-width: 20rem">
                                <h2 class="text-center text-dark bold"> Create Post for
                                    Student {{ $student->name }} </h2>
                            </div>

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
                            <a type="submit" href="/tutor/assignment/{{ $regId }}" class="btn btn-primary"> <i
                                    class="bi bi-x-lg"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-navfoot>
