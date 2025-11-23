<?php
    $newspapers = array(
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Bot',
            'description' => 'Malevolent bot is a bot for discord providing access to the data collected from the game servers to display via commands on discord.',
            'created_at' => '2025-11-20 17:00:24'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plugin',
            'description' => 'Malevolent plugin is a plugin built in C++ by Alice with modifications by Dec providing changes to the chat and additions to GSC.',
            'created_at' => '2025-11-20 17:00:24'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Scripts',
            'description' => 'Malevolent scripts is the back bone of the servers providing modifications to the game with features like bank, gambling and more.',
            'created_at' => '2025-11-20 17:00:24'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Website',
            'description' => 'Malevolent website is the front-end for the servers displaying data in collections & charts to give your more oversight of statistics.',
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
                        <img src="{{ Avatar::create('Dec')->setDimension(75)->setFontSize(36)->setChars(1)->toBase64() }}" alt="avatar">
                        <span>{{ $newspaper['author'] }}</span>
                    </a>
                    <div class="published">{{ Carbon\Carbon::parse($newspaper['created_at'])->format('F d, Y') }}</div>
                </div>
            </article>
        </div>
    @endforeach
</div>

