<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Home | A Tutoring Company</title>
    </x-slot>
</x-header>
<x-layout>
                <div x-data="{ show : false}" @click.away="show = false">
                    <button @click="show = !show" class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left">
                        {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Disciplinas'}}</button>
                        <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50" style="display: none">
                            <a href="/userposts">All</a>
                            <?php foreach ($categories as $category) : ?>
                                <a href="/categories/{{ $category->slug }}">{{ucwords($category->name)}}</a>

                            <?php endforeach; ?>
                        </div>
                </div>

    <?php foreach ($posts as $post) : ?>
        <article>
            <div class="card m-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"> <a href="/post/<?= $post->slug; ?>">
                                <?= $post->title; ?></a> </h5>
                            <h6 class="card-subtitle mb-3"> <a href="/authors/{{ $post->author->username }}">{{ $post->author->username }}</a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name}} </a> </h6>
                            <a href="#" role="button"> Nome_do_ficheiro_a_fazer_download.pdf <i class="bi bi-download"></i> </a>
                            <div class="d-none d-md-block">
                                <h5 class="card-text mt-3">Descrição</h5>
                                <p class="card-text"><?= $post->body; ?></p>
                            </div>
                            <div class="collapse multi-collapse" id=showMore>
                                <h5 class="card-text mt-3">Descrição</h5>
                                <p class="card-text"><?= $post->body; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 text-end">
                            <p class="card-text"> Uploaded: 00-00-0000</p>
                            <p class="card-text"> Submit Date: 00-00-0000</p>
                            <p class="card-text d-none d-md-block"> Submited Date: 00-00-0000</p>
                            <p class="card-text d-none d-md-block"> Grade: 00</p>
                            <div class="mb-3">
                                <p class="card-text collapse multi-collapse" id=showMore> Submited Date: 00-00-0000</p>
                                <p class="card-text collapse multi-collapse" id=showMore> Grade: 00</p>
                            </div>
                            <a class="btn btn-primary btn-sm " href="#" role="button"> Submit </a>
                            <a class="btn btn-primary btn-sm d-md-none" data-bs-toggle="collapse" href="#showMore" role="button" aria-expanded="false" aria-controls="showMore"> Show More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- old 
            <h1>
                <a href="/post/< $post->slug; ?>">
                    post-title
                </a>        
            </h1>
            <p>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->username }}</a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name}} </a>
            </p>
            <div>
               post-title
            </div> -->
        </article>
    <?php endforeach; ?>
</x-layout>