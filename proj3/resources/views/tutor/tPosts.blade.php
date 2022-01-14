<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Tutor Posts | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">
        <div class="container">
            <div class="mt-3 mx-auto d-flex">
                <form method="post" action="/tutor/createpost">
                    @csrf
                    <input type="hidden" name="id" value="{{$reg}}">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-file-earmark-plus"></i> Create new Post
                    </button>
                </form>
                <button class="btn btn-outline-primary disabled mx-1">
                     Student Id: {{ $stdId->userId }}
                </button>
            </div>

            @foreach ($posts as $post)
                <div>
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <a href="/download/{{ $post->arquivo }}" class="link-black">
                                        {{ $post->fileName }} <i class="bi bi-download"></i>
                                    </a>
                                    <div class="d-none d-md-block">
                                        <h5 class="card-text mt-3">Description</h5>
                                        <p class="card-text">{{$post->body}}</p>
                                    </div>
                                    <div class="collapse multi-collapse" id=showMore{{$post->id}}>
                                        <h5 class="card-text mt-3">Description</h5>
                                        <p class="card-text">{{$post->body}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 text-end">
                                    <p class="card-text">
                                        Uploaded: @php echo date("d/m/Y H:i", strtotime($post->created_at)); @endphp</p>
                                    <p class="card-text"> Submit
                                        Date: @php echo date("d/m/Y H:i", strtotime($post->submit_date)); @endphp</p>
                                    {{--                                    Shows different things if user as not submitted anything--}}
                                    @if ($post->submited_date == null)
                                        <p class="card-text d-none d-md-block"> Submited Date: n/a</p>
                                        <p class="card-text d-none d-md-block"> Grade: n/a</p>
                                        {{--                                        <div class="mb-3 text-end">--}}
                                        {{--                                            <p class="card-text collapse multi-collapse" id=showMore{{$post->id}}>--}}
                                        {{--                                                Submited Date: n/a--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p class="card-text collapse multi-collapse" id=showMore{{$post->id}}> Grade: n/a</p>--}}
                                        {{--                                        </div>--}}
                                    @else
                                        <p class="card-text d-none d-md-block"> Submited
                                            Date: @php echo date("d/m/Y H:i", strtotime($post->submited_date)); @endphp</p>
                                        <p class="card-text d-none d-md-block"> Grade: {{ $post->grade }}</p>
                                        <div class="mb-3 text-end">
                                            <p class="card-text collapse multi-collapse" id=showMore{{$post->id}}>
                                                Submited
                                                Date: @php echo date("d/m/Y H:i", strtotime($post->submited_date)); @endphp
                                            </p>
                                            <p class="card-text collapse multi-collapse" id=showMore{{$post->id}}>
                                                Grade: {{ $post->grade }}</p>
                                        </div>
                                    @endif

                                    {{--                                    Only show this buttons if student as uploaded a answer--}}
                                    @if($post->arquivo_aluno != null)
                                        <a class="btn btn-primary btn-sm" href="/download/{{ $post->arquivo_aluno }}">
                                            <i class="bi bi-download"></i> Download Answer</a>
                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#gradeModal{{ $post->id }}"><i
                                                class="bi bi-file-earmark-binary"></i> Grade
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="gradeModal{{ $post->id }}" tabindex="-1"
                                             aria-labelledby="gradeModal{{ $post->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="gradeModal{{ $post->id }}Label">
                                                            Submit a Grade</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="/tutor/grade">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="m-3 text-start">
                                                                <label for="grade" class="form-label">Grade:</label>
                                                                <input class="form-control" type="number" name="grade"
                                                                       id="grade">
                                                                <input name="id" type="hidden" value="{{ $post->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                <i class="bi bi-x-lg"></i> Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="bi bi-check-lg"></i> Save changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{--                                    Show more btn--}}
                                    <a class="btn btn-primary btn-sm d-md-none" data-bs-toggle="collapse"
                                       href="#showMore{{$post->id}}"
                                       role="button" aria-expanded="false" aria-controls="showMore">
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
