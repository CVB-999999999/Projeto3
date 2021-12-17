<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Post Detail | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">
        <div class="container my-4">
            <div class="card p-3">
                <div class="card-title">
                    <h1><a href="/dashboard"><i class="bi bi-arrow-left-circle-fill link-dark"></i></a>  {{$post->title}}</h1>
                </div>
                <div class="card-body">
                    <p> {{ $post->body }}</p>
                    <p> Tutor File:
                        <a class="btn btn-dark btn-sm rounded"
                           href="/download/{{ $post->arquivo }}">{{ $post->fileName }}</a>
                    </p>
                    <p> File Uploaded at: {{ $post->created_at }} | Due Date: {{ $post->submit_date }}</p>
                    @if ($post->submited_date == null)
                        <p> Submited at: n/a | Grade: n/a</p>
                    @else
                        <p> Submited at: {{ $post->submited_date }} | Grade: {{ $post->grade }}</p>
                    @endif

                    @if($post->arquivo_aluno != null)
                        <p> Your File:
                            <a class="btn btn-dark btn-sm rounded"
                               href="/download/{{ $post->arquivo_aluno }}">Download</a>
                        </p>
                    @endif

                    <form method="POST" action="/student/uploadfile"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="arquivo_aluno" class="form-label">Upload your file:</label>
                            <input class="form-control" type="file" id="arquivo_aluno" name="arquivo_aluno">
                        </div>
                        <button type="submit" class="btn btn-dark btn-sm">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-navfoot>
