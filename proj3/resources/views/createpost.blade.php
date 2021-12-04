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

        <form method="POST" action="/createpost" style="max-width: 300px; margin:auto;" enctype="multipart/form-data">
        @csrf
        <!-- Logo -->
            <div class="mt-3">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
                <h2 class="text-center text-dark bold"> Create Post </h2>

            </div>

            <!-- Title field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <!-- Description Field -->
            <div class="mb-3">

                <label for="body" class="form-label">Description:</label>
                <input type="text" id="body" name="body" style="height:400px; width: 500px;">
            </div>

            <!-- Slug Field -->
            <div class="mb-3">

                <label for="slug" class="form-label">Slug:</label>
                <input type="text" id="slug" name="slug">
            </div>

            <!-- excerpt Field -->
            <div class="mb-3">

                <label for="excerpt" class="form-label">Excerpt:</label>
                <input type="text" id="excerpt" name="excerpt">
            </div>

            <!-- Category Field -->
            <div class="mb-3">

                <label for="category_id" class="form-label">Category:</label>
                <input type="text" id="category_id" name="category_id">
            </div>
           
            <!-- file -->
            <div class="mb-3">

                <label for="arquivo" class="form-label">Arquivo:</label>
                <input type="file" id="arquivo" name="arquivo">
            </div> <br> <br>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </x-slot>
</x-navfoot>
