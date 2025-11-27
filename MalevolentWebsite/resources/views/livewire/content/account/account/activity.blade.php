<div class="activity" wire:poll.visible>
    @foreach($activitys as $activity)
        <div class="placeholder">
            <div class="title">
                <a href="{{ config('app.url') }}/profile/{{ $activity["user_name"] }}"><img src="{{ Avatar::create($activity["user_name"])->setDimension(75)->setFontSize(36)->setChars(1)->toBase64() }}"/> Dec</a>
            </div>
            <div class="description">
                {{ $activity["user_action"] }}
            </div>
        </div>
    @endforeach
</div>
