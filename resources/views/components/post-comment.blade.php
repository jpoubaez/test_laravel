<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comentari->id }}" alt="" width="60" height="60">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comentari->autor->username }}</h3>
            <p class="text-xs">Enviat <time>{{ $comentari->created_at }}</time></p>
        </header>
        <p>
            {{ $comentari->cos }}
        </p>
    </div>
</article>
