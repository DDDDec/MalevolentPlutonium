<div class="avatar" wire:poll.visible>
    <div class="avatar-image">
        <img src="{{ Avatar::create($statistics->user_name)->setDimension(250)->setShape('square')->setFontSize(64)->setChars(3)->toBase64() }}"/>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Username</div>
        <div class="description">{{ $statistics->user_name }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Rank</div>
        <div class="description">{{ $statistics->user_rank }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Joined</div>
        <div class="description">{{ $statistics->created_at->diffForHumans() }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">GUID</div>
        <div class="description">{{ $statistics->user_id }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Level</div>
        <div class="description">{{ $statistics->user_level }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Last Played</div>
        <div class="description">{{ $statistics->updated_at->diffForHumans() }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Status</div>
        <div class="description">{{ $statistics->user_banned == 1 ? 'Banned' : 'Unbanned' }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Prestige</div>
        <div class="description">{{ $statistics->user_prestige }}</div>
    </div>
    <div class="avatar-placeholder">
        <div class="title">Last Map Played</div>
        <div class="description">Nuketown</div>
    </div>
</div>
