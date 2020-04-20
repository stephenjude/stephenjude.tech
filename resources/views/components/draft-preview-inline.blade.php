<div class="flex flex-col mb-4">
    <h2 class="text-3xl mt-0">
        <a href="{{ draft_url($post->id) }}" title="Read more - {{ $post->title }}" class="text-gray-900 font-extrabold">{{ $post->title }}</a>
    </h2>

    {!! $post->excerpt ? '<p class="text-xl mb-4 mt-0">'. $post->excerpt.'</p>':'' !!}
</div>
