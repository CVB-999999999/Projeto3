<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Assign Student Discipline | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <h1 class="text-center m-4"> Student name: {{ $user->name }}</h1>
        <h4 class="text-center"> Choose a discipline to register this student</h4>

        <div class="container mx-auto mb-5" style="max-width: 50rem">
            @if($discs->isNotEmpty())
                @if( $value == null)
                    {{-- Select disciplines 1st --}}
                    <form method="GET" action="#" style="max-width: 80vw">
                        <label for="selectDisc"> Discipline: </label>
                        <select class="form-select mb-2" id="#selectDisc" name="discipline">
                            <option selected>Choose an option</option>
                            @foreach( $discs as $disc)
                                <option value=" {{ $disc->id }}"> {{ $disc->name }} </option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">
                            Next <i class="bi bi-caret-right-fill"></i>
                        </button>
                    </form>
                    {{-- When discipline selected--}}
                @else
                    <form method="post" action="/admin/users/assign" class="mx-auto" style="max-width: 80vw">
                        @csrf
                        {{-- Selected discipline--}}
                        <label for="selectDisc"> Discipline: </label>
                        <select class="form-select mb-2" id="#selectDisc" disabled>
                            <option selected value="{{ $value->id }}"> {{ $value->name }}</option>
                        </select>

                        {{-- Select tutor --}}
                        <label for="selectTutor mb-2"> Tutor: </label>
                        <select class="form-select" id="#selectTutor" name="tutor">
                            <option selected>Choose an option</option>
                            @foreach( $tList as $disc)
                                <option value=" {{ $disc->id }}"> {{ $disc->name }} </option>
                            @endforeach
                        </select>
                        <input type="hidden" value=" {{ $user->id }}" name="user">
                        <input type="hidden" value=" {{ $value->id }}" name="disc">

                        <a class="btn btn-primary mt-3" href="/admin/users/{{ $user->id }}/assign">
                            <i class="bi bi-caret-left-fill"></i> Back
                        </a>
                        <button class="btn btn-primary mt-3" type="submit">
                            <i class="bi bi-check-lg"></i> Submit
                        </button>
                    </form>
                @endif
            @else
                <h5 class="text-center"> This Student is registered to all currently available disciplines </h5>
            @endif
        </div>

        <div class="container my-3">
            <h3 class="mx-3"> Currently attending to:</h3>

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

