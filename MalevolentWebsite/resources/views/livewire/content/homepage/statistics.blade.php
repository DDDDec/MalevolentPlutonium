<div class="server-statistics" wire:poll.visible>
    <div class="vertical-scroll">
        <div class="server-statistics-grid">
            <div class="server-statistics-grid-section">
                <div class="title">Kills</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->kills }}">{{ number_format($userStatistics['statistics']->kills) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Revives</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->revives }}">{{ number_format($userStatistics['statistics']->revives) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Downs</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->downs }}">{{ number_format($userStatistics['statistics']->downs) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Headshots</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->headshots }}">{{ number_format($userStatistics['statistics']->headshots) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Circulating</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->moneys }}">£{{ number_format($userStatistics['statistics']->moneys) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Interest</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->interest }}">£{{ number_format($userStatistics['statistics']->interest) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Lost Gambling</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->lostgambling }}">£{{ number_format($userStatistics['statistics']->lostgambling) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Won Gambling</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->wongambling }}">£{{ number_format($userStatistics['statistics']->wongambling) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Chat Games</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->chatgames }}">{{ number_format($userStatistics['statistics']->chatgames) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Missions</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->missions }}">{{ number_format($userStatistics['statistics']->missions) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Achievements</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->achievements }}">{{ number_format($userStatistics['statistics']->achievements) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Vaults Cracked</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->vaults }}">{{ number_format($userStatistics['statistics']->vaults) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Times Prestiged</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->prestiges }}">{{ number_format($userStatistics['statistics']->prestiges) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Times Level-up</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->levels }}">{{ number_format($userStatistics['statistics']->levels) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Players</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->users }}">{{ number_format($userStatistics['statistics']->users) }}</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Players Banned</div>
                <div class="description" data-target="{{ $userStatistics['statistics']->bans }}">{{ number_format($userStatistics['statistics']->bans) }}</div>
            </div>
        </div>
    </div>
</div>
