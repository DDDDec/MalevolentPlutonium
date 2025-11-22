<?php
    $newspapers = array(
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 1',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.',
            'created_at' => '2025-11-20 17:00:24'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 2',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.',
            'created_at' => '2025-11-20 17:00:24'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 3',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.',
            'created_at' => '2025-11-20 17:00:24'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 4',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.',
            'created_at' => '2025-11-20 17:00:24'
        ),
    );
?>

<div class="newspaper">
    @foreach ($newspapers as $newspaper)
        <div>
            <article>
                <h2 class="title news-title" data-index="0">{{ $newspaper['title'] }}</h2>
                <p class="description news-description" data-index="0">{{ $newspaper['description'] }}</p>
                <div class="author news-author" data-index="0">
                    <a href="/">
                        <img src="{{ $newspaper['image'] }}" alt="avatar">
                        <span>{{ $newspaper['author'] }}</span>
                    </a>
                    <div class="published">{{ Carbon\Carbon::parse($newspaper['created_at'])->format('F d, Y') }}</div>
                </div>
            </article>
        </div>
    @endforeach
</div>

