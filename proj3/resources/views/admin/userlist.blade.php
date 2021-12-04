<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>User List | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <div class="container">
            <!-- Search Field -->
            <div>
                <form method="GET" action="#">
                    <div class="input-group m-3 mx-auto" style="max-width: 80vw">
                        <input type="text" name="search" class="form-control"
                               placeholder="Input a name, email or phone number to start searching">
                        <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

            @foreach($users as $key=>$user)

                <div class="card m-4 p-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><h4> Name: {{ $user->name }}</h4></p>
                                <p> Email: {{ $user->email }}</p>
                                <p> Phone: {{ $user->phone }}</p>
                            </div>
                            <div class="col-lg-6 text-end">
                                <p> Created on: {{ $user->created_at }} </p>
                                <p> Last Updated: {{ $user->updated_at }} </p>
                                <p> Status:
                                    {{--                                    Convert Boolean to something easier to read --}}
                                    @php if($user->active == true) {
                                        echo ' Active';
                                    } else {
                                        echo 'Inactive';
                                    } @endphp
                                </p>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target='#item{{$key}}' aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-gear-fill"></i> Options
                        </button>
                        <div class="collapse" id='item{{$key}}'>
                            <div class="card card-body">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action">
                                        Change Disciplines
                                    </button>
                                    <form method="POST" action="/admin-change-password">
                                        @csrf
                                        <button type="submit" class="list-group-item list-group-item-action">
                                            Reset password
                                        </button>
                                        <input type="hidden" value="{{ $user->email }}" name="email">
                                    </form>
                                    <button type="button" class="list-group-item list-group-item-action"
                                            data-bs-toggle="modal" data-bs-target="#confirmModal{{ $user->id }}"> Change account Status
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmModal{{ $user->id }}" tabindex="-1"
                                         aria-labelledby="confirmModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="confirmModalLabel{{ $user->id }}">
                                                        Are you sure you want to change the status of this user?
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Name: {{ $user->name }} </p>
                                                    <p> Email: {{ $user->email }}</p>

{{--                                                Show current status e new status --}}
                                                    @php if ( $user->active == true ) {
                                                        echo '<p> Current Status: Active </p>';
                                                        echo '<p><strong> New Status: Inactive </strong></p>';
                                                    } else {
                                                        echo '<p> Current Status: Inactive </p>';
                                                        echo '<p><strong> New Status: Active </strong></p>';
                                                    } @endphp

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        No
                                                    </button>
                                                    <form method="POST" action="/admin-toogle-status">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            Yes
                                                        </button>
                                                        <input type="hidden" value="{{ $user->email }}" name="email">
                                                        <input type="hidden" value="{{ $user->active }}" name="active">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="m-5">
                {{$users->links()}}
            </div>
        </div>
    </x-slot>
</x-navfoot>

