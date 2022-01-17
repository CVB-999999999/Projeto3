<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Dashboard | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        {{ Breadcrumbs::render('userDash') }}

        <div class="container">
            <div>
                {{--                 Search Field  --}}
                <div class="mx-md-5 mx-1 mt-1">
                    <form method="GET" action="#">
                        <div class="input-group m-2 mx-auto">
                            {{--                            Discipline select btn--}}
                            <a class="btn btn-primary" data-bs-toggle="collapse"
                               href="#category" role="button" aria-expanded="false" aria-controls="category">
                                Disciplines
                            </a>
                            {{--                            Search bar--}}
                            <input type="text" name="search" class="form-control"
                                   placeholder="Search for file name or title">
                            <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    {{--                        Dropdown with the disciplines--}}
                    <div class="collapse" id="category">
                        <div class="card card-body text-center p-2 " style="max-width: 20rem">
                            <a class="btn btn-primary" href="/dashboard">All</a>
                            <form method="GET" action="#">
                                <div class="my-3 d-grid gap-2">
                                    @foreach($categories as $category)
                                        <input type="checkbox" name="discipline" class="btn-check"
                                               id="ctgList{{ $category->id }}"
                                               value="{{ $category->name }}">
                                        <label class="btn btn-primary"
                                               for="ctgList{{ $category->id }}">{{ $category->name }}</label>
                                    @endforeach
                                </div>
                                <button class="btn btn-secondary" type="submit">Select</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($posts as $key=>$post)
                <div>
                    <div class="card m-md-5 m-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title"><a href="/post/{{$post->slug}}" class="link-black">
                                            {{$post->title}}</a></h4>
                                    <h6 class="card-subtitle my-1">
                                        By {{ $tutors[$key]->name }} in {{ $catgs[$key]->name }}
                                    </h6>
                                    <a href="/download/{{ $post->arquivo }}" class="link-black">
                                        {{ $post->fileName }} <i class="bi bi-download"></i>
                                    </a>
                                    <div class="d-none d-md-block">
                                        <h5 class="card-text mt-3">Description</h5>
                                        <p class="card-text">{{$post->body}}</p>
                                    </div>
                                    <div class="collapse multi-collapse" id=showMore{{ $post->id }}>
                                        <h5 class="card-text mt-3">Description</h5>
                                        <p class="card-text">{{$post->body}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3 text-end">
                                    <p class="card-text">
                                        Uploaded: @php echo date("d/m/Y H:i", strtotime($post->created_at)); @endphp</p>
                                    <p class="card-text"> Submit
                                        Date: @php echo date("d/m/Y H:i", strtotime($post->submit_date)); @endphp</p>
                                    {{--                                    Shows different things if user as not submitted anything--}}
                                    @if ($post->submited_date == null)
                                        <p class="card-text d-none d-md-block"> Submited Date: n/a</p>
                                        <p class="card-text d-none d-md-block"> Grade: n/a</p>
                                        {{--                                        <div class="mb-3 text-end">--}}
                                        {{--                                            <p class="card-text collapse multi-collapse" id=showMore{{ $post->id }}>--}}
                                        {{--                                                Submited Date: n/a--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p class="card-text collapse multi-collapse" id=showMore{{ $post->id }}>--}}
                                        {{--                                                Grade: n/a--}}
                                        {{--                                            </p>--}}
                                        {{--                                        </div>--}}
                                    @else
                                        <p class="card-text d-none d-md-block">
                                            Submited
                                            Date: @php echo date("d/m/Y H:i", strtotime($post->submited_date)); @endphp
                                        </p>
                                        <p class="card-text d-none d-md-block"> Grade: {{ $post->grade }}</p>
                                        <div class="mb-3 text-end">
                                            <p class="card-text collapse multi-collapse" id=showMore{{ $post->id }}>
                                                Submited
                                                Date: @php echo date("d/m/Y H:i", strtotime($post->submited_date)); @endphp
                                            </p>
                                            <p class="card-text collapse multi-collapse" id=showMore{{ $post->id }}>
                                                Grade: {{ $post->grade }}
                                            </p>
                                        </div>
                                    @endif

                                    {{--                                Button to open modal--}}
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modal{{ $post->id }}">
                                        <i class="bi bi-upload"></i> Submit
                                    </button>

                                    {{--                                Modal to upload file--}}
                                    <div class="modal fade" id="modal{{ $post->id }}" tabindex="-1"
                                         aria-labelledby="modal{{ $post->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal{{ $post->id }}Label">
                                                        Submit File
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="/student/uploadfile"
                                                      enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input class="form-control" type="file" id="arquivo_aluno"
                                                               name="arquivo_aluno">
                                                        @error('arquivo_aluno')
                                                        <script>
                                                            Swal.fire(
                                                                'An error occurred!',
                                                                '{{ $message }}',
                                                                'error'
                                                            )
                                                        </script>
                                                        <p class="text-danger"><small> {{ $message }} </small></p>
                                                        @enderror
                                                        <input type="hidden" name="slug" value="{{ $post->slug }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            <i class="bi bi-x-lg"></i> Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-upload"></i> Upload
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{--                                    Show more btn--}}
                                    <a class="btn btn-primary btn-sm d-md-none" data-bs-toggle="collapse"
                                       href="#showMore{{ $post->id }}" role="button" aria-expanded="false"
                                       aria-controls="showMore{{ $post->id }}">
                                        <i class="bi bi-three-dots-vertical"></i> Show More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="m-5">
                {{$posts->links()}}
            </div>
        </div>
    </x-slot>
</x-navfoot>
