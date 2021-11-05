<x-layout>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
                <a href="/post/<?= $post->slug; ?>">
                    <?= $post->title; ?>
                </a>        
            </h1>
            <p>
                <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name}} </a>
            </p>
            <div>
                <?= $post->body; ?>
            </div>
        </article>
    <?php endforeach; ?>
</x-layout>