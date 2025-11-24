<div class="player-actions" wire:poll.visible>
    @foreach($userActions as $userAction)
        <div class="placeholder">
            <div class="title">
                <a href="{{ config('app.url') }}/profile/{{ $userAction['user_name'] }}"><img src="{{ Avatar::create($userAction['user_name'])->setDimension(75)->setFontSize(36)->setChars(1)->toBase64() }}"/> {{ $userAction['user_name'] ?? 'Dec' }}</a>
            </div>
            <div class="description">
                {{ $userAction['user_action'] }}
            </div>
        </div>
    @endforeach
</div>
