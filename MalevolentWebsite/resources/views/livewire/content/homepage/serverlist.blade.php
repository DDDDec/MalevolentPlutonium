<div class="serverlist" wire:poll.visible>
    <div class="vertical-scroll">
        <div class="serverlist-grid">
            @foreach($servers as $server)
                <div class="serverlist-grid-section">
                    <div class="title"><i class="fa-solid fa-circle pulse"></i> {{ $server['ip'] }}:{{ $server['port'] }}</div>
                    <div class="description">Nuketown</div>
                    <progress
                        class="progress"
                        value="1"
                        max="8"
                    ></progress>
                </div>
            @endforeach
        </div>
    </div>
</div>
