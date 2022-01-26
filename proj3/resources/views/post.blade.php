<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Post Detail | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        {{ Breadcrumbs::render('userPost', $post->id, $post->slug) }}

        <div class="container mb-4">
            <div class="card p-3 rounded-3 shadow">
                <div class="card-title">
                    {{-- Title--}}
                    <h1><a href="/dashboard"><i class="bi bi-arrow-left-circle-fill link-dark"></i></a> {{$post->title}}
                    </h1>
                </div>
                <div class="card-body">
                    {{-- File Description--}}
                    <div>
                        <p> {{ $post->body }}</p>
                    </div>
                    {{-- Tutor file info--}}
                    <div>
                        <p>
                            <a class="btn btn-primary btn-sm rounded" href="/download/{{ $post->arquivo }}"> Download <i
                                    class="bi bi-download"></i></a>
                            Tutor File: {{ $post->fileName }}
                        </p>
                        <p> File Uploaded at: @php echo date("d/m/Y H:i", strtotime($post->created_at)); @endphp | Due
                            Date: @php echo date("d/m/Y H:i", strtotime($post->submit_date)); @endphp</p>
                    </div>

                    <div>
                        @if ($post->submited_date == null)
                            <p> Submited at: n/a | Grade: n/a</p>
                        @else
                            <p> Submited at: @php echo date("d/m/Y H:i", strtotime($post->submited_date)); @endphp |
                                Grade: {{ $post->grade }}</p>
                        @endif

                        @if($post->arquivo_aluno != null)
                            <p>
                                <a class="btn btn-primary btn-sm rounded"
                                   href="/download/{{ $post->arquivo_aluno }}">Download <i
                                        class="bi bi-download"></i></a>
                                Your Submission
                            </p>
                        @endif
                    </div>

                    <form method="POST" action="/student/uploadfile" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="arquivo_aluno" class="form-label">Upload a Submission:</label>
                            <input class="form-control" type="file" id="arquivo_aluno" name="arquivo_aluno">
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
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-upload"></i> Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-navfoot>
