<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Student List | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <div class="container mb-3">

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
                                <p> Status: to-do</p>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target='#item{{$key}}' aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-gear-fill"></i> Options
                        </button>
                        <div class="collapse" id='item{{$key}}'>
                            <div class="card card-body">
                                <div class="list-group">
                                    <button type="button"class="list-group-item list-group-item-action"> Change Disciplines</button>
                                    <form  method="POST" action="/admin-change-password" >
                                        @csrf
                                        <button type="submit" class="list-group-item list-group-item-action"> Reset Password</button>
                                        <input type="hidden" value="{{ $user->email }}" name="email">
                                    </form>
                                    <button type="button" class="list-group-item list-group-item-action"> Disable account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </x-slot>
</x-navfoot>

