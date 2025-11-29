<div class="statistics" wire:poll.visible>
    <div class="placeholder">
        <div class="title">
            Money
        </div>
        <div class="description">
            £{{ number_format($statistics->user_money) }}
        </div>
    </div>
    <div class="placeholder">
        <div class="title">
            Kills
        </div>
        <div class="description">
            {{ number_format($statistics->user_kills) }}
        </div>
    </div>
    <div class="placeholder">
        <div class="title">
            Downs
        </div>
        <div class="description">
            {{ number_format($statistics->user_downs) }}
        </div>
    </div>
    <div class="placeholder">
        <div class="title">
            Revives
        </div>
        <div class="description">
            {{ number_format($statistics->user_revives) }}
        </div>
    </div>
    <div class="placeholder">
        <div class="title">
            Headshots
        </div>
        <div class="description">
            {{ number_format($statistics->user_headshots) }}
        </div>
    </div>
</div>
