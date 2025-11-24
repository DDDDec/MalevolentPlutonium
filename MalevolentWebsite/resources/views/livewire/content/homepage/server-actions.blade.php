<div class="server-actions" wire:poll.visible>
    @foreach($serverActions as  $serverAction)
        <div class="placeholder">
            <div class="title">
                <a href="{{ config('app.url') }}/map/Nuketown"><img src="{{ Avatar::create('Dec')->setDimension(75)->setFontSize(36)->setChars(1)->toBase64() }}"/> Nuketown</a>
            </div>
            <div class="description">
                The nuketown server is now online and ready to play
            </div>
        </div>
    @endforeach
</div>
