                @props(['post'])
                <article
                    {{ $attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
                    <div class="py-6 px-5">
                        <div>
                            <img src="/storage/{{ $post->thumbnail }}" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between flex-1">
                            <header>
                                <div class="space-x-2">
                                    <x-categoria-button :categoria="$post->categoria" />
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-xl">
                                        <a href="/posts/{{ $post->slug }}">{{ $post->titol }}</a>
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-4 space-y-4">
                                
                                {!! $post->excerpt !!}
                                

                            </div>

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    <img src="/storage/{{ $post->thumbnail }}" alt="Lary avatar">
                                    <div class="ml-3">
                                        <h5 class="font-bold">
                                            <a href="/blog?autor={{ $post->autor->username }}">{{ $post->autor->name }}</a>
                                        </h5>
                                    </div>
                                </div>

                                <div class="flex text-sm">
                                    <a href="/posts/{{ $post->slug }}"
                                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                    >Read More</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>