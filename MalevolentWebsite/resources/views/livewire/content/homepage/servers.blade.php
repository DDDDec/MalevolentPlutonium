<div class="serverlist" wire:poll.visible>
    <div class="vertical-scroll">
        <div class="serverlist-grid">
            @foreach($servers as $server)
                <div class="serverlist-grid-section">
                    <div class="title"><i class="fa-solid fa-circle pulse"></i> {{ $server['server_ip'] }}:{{ $server['server_port'] }}</div>
                    <div class="description">Nuketown</div>
                    <progress
                        class="progress"
                        value="{{ $server['server_player_count'] }}"
                        max="{{ $server['server_max_player_count'] }}"
                    ></progress>
                </div>
            @endforeach
        </div>
    </div>
</div>
