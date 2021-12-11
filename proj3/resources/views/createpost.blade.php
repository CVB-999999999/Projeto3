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
            <!-- Registration Field -->
            <label for="selectDisc"> Aluno: </label>
                        <select class="form-select mb-2" id="registration_id" name="registration_id">
                            <option selected>Choose an option</option>
                                <?php foreach ($alunos as $aluno) : ?>
                                    <option id="registration_id" name="registration_id" value="{{$aluno->id}}">{{$aluno->name}}</option>
                                <?php endforeach; ?>
                        </select>

            <!-- Category Field -->
                    <label for="selectDisc"> Discipline: </label>
                        <select class="form-select mb-2" id="category_id" name="category_id">
                            <option selected>Choose an option</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option id="category_id" name="category_id" value="{{$category->id}}"> {{$category->name}}</option>
                                <?php endforeach; ?>
                        </select>

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
