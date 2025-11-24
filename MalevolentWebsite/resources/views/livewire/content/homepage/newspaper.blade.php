<div class="newspaper" wire:poll.visible>
    @foreach ($newspapers as $newspaper)
        <div>
            <article>
                <h2 class="title news-title" data-index="0">{{ $newspaper['newspaper_title'] }}</h2>
                <p class="description news-description" data-index="0">{{ $newspaper['newspaper_description'] }}</p>
                <div class="author news-author" data-index="0">
                    <a href="/">
                        <img src="{{ Avatar::create($newspaper['newspaper_author'])->setDimension(75)->setFontSize(36)->setChars(1)->toBase64() }}" alt="avatar">
                        <span>{{ $newspaper['newspaper_author'] }}</span>
                    </a>
                    <div class="published">{{ Carbon\Carbon::parse($newspaper['created_at'])->format('F d, Y') }}</div>
                </div>
            </article>
        </div>
    @endforeach
</div>
