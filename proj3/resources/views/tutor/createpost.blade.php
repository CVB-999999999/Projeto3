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
        <div class="container mb-3">
            <form class="mx-auto" method="POST" action="/tutor/createpost" style="max-width: 80vw; width: 25rem"
                  enctype="multipart/form-data">
            @csrf
            <!-- Logo -->
                <div class="mt-3 text-center">
                    <img src="/images/owl.svg" alt="Avatar Logo" class="rounded-pill" style="max-width: 20rem">
                    <h2 class="text-center text-dark bold"> Create Post </h2>
                </div>

                <!-- Title field -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
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

                <!-- Registration Field -->
                <label for="selectDisc"> Aluno: </label>
                <select class="form-select mb-2" id="aluno_id" name="aluno_id">
                    <option selected>Choose an option</option>
                    <?php foreach ($alunos as $aluno) : ?>
                    <option id="aluno_id" name="aluno_id"
                            value="{{$aluno->id}}">{{$aluno->id}} {{$aluno->name}}</option>
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

                <!-- Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </x-slot>
</x-navfoot>
