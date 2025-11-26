<div class="ranks" wire:poll.visible>
    <div class="ranks-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            Vip Rank
        </div>
        <div class="description">
            This package will change your rank to VIP and give you access to commands and other perks locked behind a rank.<br><br>
            Cost: £{{ number_format(100000) }}
        </div>
        @if($rank == 5)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(1)">Buy</a>
        @endif
    </div>
    <div class="ranks-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            VIP+ Rank
        </div>
        <div class="description">
            This package will change your rank to VIP+ and give you access to commands and other perks locked behind a rank.<br><br>
            Cost: £{{ number_format(100000) }}
        </div>
        @if($rank == 1)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(2)">Buy</a>
        @endif
    </div>
    <div class="ranks-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            VIP++ Rank
        </div>
        <div class="description">
            This package will change your rank to VIP++ and give you access to commands and other perks locked behind a rank.<br><br>
            Cost: £{{ number_format(100000) }}
        </div>
        @if($rank == 6)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(3)">Buy</a>
        @endif
    </div>
    <div class="ranks-section">
        <div class="title">
            <i class="fa-solid fa-palette"></i>
            VIP+++ Rank
        </div>
        <div class="description">
            This package will change your rank to VIP+++ and give you access to commands and other perks locked behind a rank.<br><br>
            Cost: £{{ number_format(100000) }}
        </div>
        @if($rank == 2)
            <a>Already in use</a>
        @else
            <a wire:click.prevent="purchase(4)">Buy</a>
        @endif
    </div>
</div>
