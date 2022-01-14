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

        <div class="container">
            <div class="card m-md-5 p-md-5 p-3 m-1">
                <form method="POST" class="mx-auto mb-5" action="/admin/create/discipline" style="width: 100%">
                @csrf
                <!-- Logo -->
                    <div class="mt-3 d-flex justify-content-center">
                        <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-height: 4rem">
                        <h1 class="text-center text-dark bold"> Create a Discipline</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <!-- Name field -->
                            <div class="my-3">
                                <label for="name" class="form-label">Discipline Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <!-- Disc Code Field -->
                            <div class="mb-3">
                                <label for="slug" class="form-label">Discipline Code:</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>


                            <!-- Grade Field -->
                            <div class="mb-3">
                                <label for="grade" class="form-label">School Year:</label>
                                <input type="text" class="form-control" id="grade" name="grade">
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
