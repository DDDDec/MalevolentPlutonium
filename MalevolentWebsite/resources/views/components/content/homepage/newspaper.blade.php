<?php
    $newspaper = array(
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 1',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 2',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 3',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.'
        ),
        array(
            'author' => 'Dec',
            'image' => asset('Malevolent/images/Dec.webp'),
            'title' => 'Malevolent Plutonium Project 4',
            'description' => 'This is a long description about the new and upcoming project called Malevolent which is for Plutonium Black Ops 2 zombies.'
        ),
    );
?>

<div class="newspaper">
    <div>
        <article>
            <h2 class="title news-title" data-index="0">{{ $newspaper[0]['title'] }}</h2>
            <p class="description news-description" data-index="0">{{ $newspaper[0]['description'] }}</p>
            <div class="author news-author" data-index="0">
                <a href="/">
                    <img src="{{ $newspaper[0]['image'] }}" alt="avatar">
                    <span>{{ $newspaper[0]['author'] }}</span>
                </a>
            </div>
        </article>
        <progress id="newspaper-progress" class="progress" value="0" max="1000"></progress>
    </div>

    <div>
        <article>
            <h2 class="title news-title fade" data-index="1">{{ $newspaper[1]['title'] }}</h2>
            <p class="description news-description fade" data-index="1">{{ $newspaper[1]['description'] }}</p>
            <div class="author news-author fade" data-index="1">
                <a href="/">
                    <img src="{{ $newspaper[1]['image'] }}" alt="avatar">
                    <span>{{ $newspaper[1]['author'] }}</span>
                </a>
            </div>
        </article>
    </div>

    <div>
        <article>
            <h2 class="title news-title fade" data-index="2">{{ $newspaper[2]['title'] }}</h2>
            <p class="description news-description fade" data-index="2">{{ $newspaper[2]['description'] }}</p>
            <div class="author news-author fade" data-index="2">
                <a href="/">
                    <img src="{{ $newspaper[2]['image'] }}" alt="avatar">
                    <span>{{ $newspaper[2]['author'] }}</span>
                </a>
            </div>
        </article>
    </div>
</div>


<script>
    function initNewspaperProgress() {
        const newspapers = {!! json_encode($newspaper) !!};

        const progress = document.getElementById('newspaper-progress');
        if (!progress) return;

        const titles = document.querySelectorAll('.news-title');
        const descriptions = document.querySelectorAll('.news-description');
        const authors = document.querySelectorAll('.news-author'); // NEW

        const max = progress.max;

        let value = 0;
        let currentIndex = 0;
        let interval = null;

        function updateContent() {
            titles.forEach((el, i) => {
                el.classList.add(i === 0 ? 'slide-out' : 'fade-out');
            });

            descriptions.forEach((el, i) => {
                el.classList.add(i === 0 ? 'slide-out' : 'fade-out');
            });

            // animate authors too
            authors.forEach((el, i) => {
                el.classList.add(i === 0 ? 'slide-out' : 'fade-out');
            });

            setTimeout(() => {
                currentIndex = (currentIndex + 1) % newspapers.length;

                titles.forEach((el, i) => {
                    const idx = (currentIndex + i) % newspapers.length;
                    el.textContent = newspapers[idx].title;

                    el.classList.remove(i === 0 ? 'slide-out' : 'fade-out');
                    el.classList.add(i === 0 ? 'slide-in' : 'fade-in');
                });

                descriptions.forEach((el, i) => {
                    const idx = (currentIndex + i) % newspapers.length;
                    el.textContent = newspapers[idx].description;

                    el.classList.remove(i === 0 ? 'slide-out' : 'fade-out');
                    el.classList.add(i === 0 ? 'slide-in' : 'fade-in');
                });

                // update author avatar + name
                authors.forEach((el, i) => {
                    const idx = (currentIndex + i) % newspapers.length;
                    const img = el.querySelector('img');
                    const span = el.querySelector('span');

                    if (img) img.src = newspapers[idx].image;
                    if (span) span.textContent = newspapers[idx].author;

                    el.classList.remove(i === 0 ? 'slide-out' : 'fade-out');
                    el.classList.add(i === 0 ? 'slide-in' : 'fade-in');
                });

                setTimeout(() => {
                    titles.forEach(el => el.classList.remove('slide-in', 'fade-in'));
                    descriptions.forEach(el => el.classList.remove('slide-in', 'fade-in'));
                    authors.forEach(el => el.classList.remove('slide-in', 'fade-in'));
                }, 600);

            }, 600);
        }

        function startProgress() {
            value = 0;
            progress.value = 0;

            if (interval) clearInterval(interval);

            interval = setInterval(() => {
                value++;
                progress.value = value;

                if (value >= max) {
                    clearInterval(interval);
                    updateContent();
                    startProgress();
                }
            }, 10);
        }

        startProgress();
    }

    document.addEventListener('DOMContentLoaded', initNewspaperProgress);
    document.addEventListener('livewire:navigated', initNewspaperProgress);
</script>

