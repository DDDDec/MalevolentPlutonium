<div class="colors" wire:poll.visible>
    <div class="colors-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            Blue Username Color
        </div>
        <div class="description">
            This package will change the color of your username to blue in-game for you to see and everyone else.
        </div>
        @if($color == 5)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(5)">Buy</a>
        @endif
    </div>
    <div class="colors-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            Red Username Color
        </div>
        <div class="description">
            This package will change the color of your username to blue in-game for you to see and everyone else.
        </div>
        @if($color == 1)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(1)">Buy</a>
        @endif
    </div>
    <div class="colors-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            Pink Username Color
        </div>
        <div class="description">
            This package will change the color of your username to blue in-game for you to see and everyone else.
        </div>
        @if($color == 6)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(6)">Buy</a>
        @endif
    </div>
    <div class="colors-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            Green Username Color
        </div>
        <div class="description">
            This package will change the color of your username to blue in-game for you to see and everyone else.
        </div>
        @if($color == 2)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(2)">Buy</a>
        @endif
    </div>
</div>

