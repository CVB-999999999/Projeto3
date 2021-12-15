<x-layout>
        <article>
            <h1><?= $post->title ?></h1>
            <a href="/download/{{ $post->arquivo }}">Download</a>
            <p>
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->username }}</a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name}} </a>
            </p>
            <div>
                <?= $post->body; ?>
            </div>
            </article>
            <form method="POST" action="/changepost/{{ $post->slug }}" style="max-width: 300px; margin:auto;" enctype="multipart/form-data">
                @csrf
                <!-- file -->
                <div class="mb-3">
                    <label for="arquivo_aluno" class="form-label">Arquivo:</label>
                    <input type="file" id="arquivo_aluno" name="arquivo_aluno">
                </div> 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            Your submission:<a href="/download/{{ $post->arquivo_aluno }}">Download</a>
            <br>
        <a href="/userposts">Go Back</a>
</x-layout>
