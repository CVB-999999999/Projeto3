<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Tutor Detail List | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        {{ Breadcrumbs::render('listTutor', $users->id) }}

        <div class="container">
            {{--             No discipline found--}}

            @if( $users == 'sad')
                <p><h1 class="text-center m-3"> This tutor does not exist :( </h1></p>

            @else
                <p><h2 class="text-center m-3"> Tutor: {{ $users->name }} </h2></p>

                @if( $discs == [])
                    <h1 class="text-center m-5"> This tutor does not have any discipline assigned</h1>
                @endif
                <div class="d-flex justify-content-center">
                    <a href="/admin/tutors/{{ $users->id }}/assign" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle"></i> Assign discipline
                    </a>
                </div>

                @foreach($discs as $key=>$disc)
                    <div class="card m-4 p-0">
                        <div class="card-body">
                            <p><h4> Discipline: {{ $disc->name }}</h4></p>
                            <p> ID: {{ $disc->slug }}</p>
                            <p> School Year: {{ $disc->grade }}</p>
                            <p> Status:
                                {{-- Convert Boolean to something easier to read --}}
                                @php if($insc[$key]->active == true) {
                                        echo ' Active';
                                    } else {
                                        echo ' Inactive';
                                    } @endphp
                            </p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#confirmModal{{ $disc->id }}">
                                <i class="bi bi-toggles"></i> Toggle Status
                            </button>

                            <!-- Modal To Confirm User Status Toggle -->
                            <div class="modal fade" id="confirmModal{{ $disc->id }}" tabindex="-1"
                                 aria-labelledby="confirmModalLabel{{ $disc->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="confirmModalLabel{{ $disc->id }}">
                                                Are you sure you want to change the status of this assignment?
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p> Discipline: {{ $disc->name }}</p>
                                            <p> ID: {{ $disc->slug }}</p>
                                            <p> Grade: {{ $disc->grade }}</p>

                                            {{-- Show current status e new status --}}
                                            @php if ( $insc[$key]->active == true ) {
                                                        echo '<p> Current Status: Active </p>';
                                                        echo '<p><strong> New Status: Inactive </strong></p>';
                                                    } else {
                                                        echo '<p> Current Status: Inactive </p>';
                                                        echo '<p><strong> New Status: Active </strong></p>';
                                                    }
                                            @endphp
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal"> No
                                            </button>

                                            <form method="POST" action="/admin/tutors/{{$users->id}}/toggle">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"> Yes</button>
                                                <input type="hidden" value="{{ $insc[$key]->id }}" name="id">
                                                <input type="hidden" value="{{ $insc[$key]->active }}" name="active">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </x-slot>
</x-navfoot>

