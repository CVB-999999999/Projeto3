<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Assign Tutor Discipline | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <h1 class="text-center m-4"> Tutor name: {{ $user->name }}</h1>
        <h4 class="text-center"> Choose a discipline for the tutor to teach</h4>

        <div class="container mx-auto mb-5" style="max-width: 50rem">
            @if($discs->isNotEmpty())
                <form method="post" action="/admin/tutors/assign" class="mx-auto" style="max-width: 80vw">
                    @csrf
                    <label for="selectDisc"> Discipline: </label>
                    {{-- Select disciplines --}}
                    <select class="form-select" id="#selectDisc" name="disc">
                        <option selected>Choose an option</option>
                        @foreach( $discs as $disc)
                            <option value=" {{ $disc->id }}"> {{ $disc->name }} </option>
                        @endforeach
                    </select>
                    <input type="hidden" value=" {{ $user->id }}" name="user">

                    <button class="btn btn-dark mt-3" type="submit"> Submit</button>
                </form>
            @else
                <h5 class="text-center"> This Tutor is assigned to all currently available disciplines </h5>
            @endif
        </div>

        <div class="container my-3">
            <h3 class="mx-3"> Currently assigned to:</h3>

            @if($assigns->isEmpty())
                <h4 class="mx-3"> Nothing :(</h4>
            @endif

            <div class="row mx-3">
                @foreach($assigns as $assign)
                    <div class="col-md-3 g-1">
                        <div class="card" style="max-width: 20rem">
                            <div class="card-body">
                                <h5 class="card-title">{{ $assign->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $assign->slug }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-navfoot>

