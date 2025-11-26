<header>
    <div class="container">
        <div class="header">
            <h1>{{ config('app.name', 'Laravel') }} Zombie Servers</h1>
            <p>
                Welcome to {{ config('app.name', 'Laravel') }} zombie servers, at {{ config('app.name', 'Laravel') }} servers we host a variety of game modes
                <br>including gambling servers, high round servers, modded servers and vanilla
                <br>servers for you to enjoy by yourself or with your friends!
            </p>
            <div>
                <livewire:global.player-count/>
            </div>
        </div>
    </div>
</header>
