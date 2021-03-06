<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title> Disciplines List | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        {{ Breadcrumbs::render('disciplines') }}

        <div class="container">
            <h1 class="text-center mx-5 mb-5">ATC Disciplines List</h1>

            <!-- Search Field -->
            <div class="m-4">
                <form method="GET" action="#">
                    <div class="input-group m-3 mx-auto" style="max-width: 80vw">
                        <a href="/admin/create/discipline" class="btn btn-secondary">
                            <i class="bi bi-plus-circle"></i>
                            <span class="d-none d-sm-inline"> Add new Discipline </span>
                        </a>
                        <input type="text" name="search" class="form-control"
                               placeholder="Search for name, code or grade">
                        <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

            @foreach($catgs as $key=>$catg)

                <div class="card m-4 p-0">
                    <div class="card-body">
                        <p><h4> Discipline: {{ $catg->name }} </h4></p>
                        <p> Discipline Code: {{ $catg->slug }}</p>
                        <p> School Year: {{ $catg->grade }}</p>
                        <p> Status:
                            {{-- Convert Boolean to something easier to read --}}
                            @php if($catg->active == true) {
                                echo ' Active';
                            } else {
                                echo ' Inactive';
                            } @endphp
                        </p>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#confirmModalPWD{{ $catg->id }}">
                            <i class="bi bi-toggles"></i> Toggle Status
                        </button>

                        <!-- Confirm Change Modal -->
                        <div class="modal fade" id="confirmModalPWD{{ $catg->id }}" tabindex="-1"
                             aria-labelledby="confirmModalPWD{{ $catg->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmModalPWD{{ $catg->id }}Label">
                                            Are you sure you want to disable this discipline?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p> Name: {{ $catg->name }} </p>
                                        <p> Discipline Code: {{ $catg->slug }}</p>
                                        <p> Status:
                                            @php if($catg->active == true) {
                                                echo ' Active';
                                            } else {
                                                echo ' Inactive';
                                            } @endphp
                                        </p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No
                                        </button>
                                        <form method="POST" action="/admin/disciplines">
                                            @csrf
                                            <input type="hidden" value="{{ $catg->slug }}" name="slug">
                                            <input type="hidden" value="{{ $catg->active }}" name="active">
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-navfoot>

