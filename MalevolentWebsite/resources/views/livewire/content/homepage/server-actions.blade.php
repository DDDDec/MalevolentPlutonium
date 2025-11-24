<div class="server-actions" wire:poll.visible>
    @foreach($serverActions as  $serverAction)
        <div class="placeholder">
            <div class="title">
                <a href="{{ config('app.url') }}/map/{{ $serverAction['server_name'] }}"><img src="{{ Avatar::create($serverAction['server_name'])->setDimension(75)->setFontSize(36)->setChars(1)->toBase64() }}"/> {{ $serverAction['server_name'] }}</a>
            </div>
            <div class="description">
                {{ $serverAction['server_action'] }}
            </div>
        </div>
    @endforeach
</div>
