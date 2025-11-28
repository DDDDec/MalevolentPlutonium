<div class="achievement" wire:poll.visible>
    <div class="vertical-scroll">
        <div class="achievement-grid">
            @foreach($missions as $mission)
                <div class="achievement-grid-section">
                    <div class="title"><i class="fa-solid fa-circle pulse"></i> {{ $mission->mission_name }}</div>
                    <div class="description">{{ $mission->mission_type }}</div>
                    @php
                        $currentStat = $userStatistics?->{$mission->mission_statistic} ?? 0;
                        $currentProgress = $currentStat - $mission->mission_statistic_progress;
                        $isComplete = $currentProgress >= $mission->mission_statistic_amount;
                    @endphp
                    @if($mission->mission_completed)
                        <a disabled>Claimed</a>
                    @elseif($isComplete)
                        <a wire:click="mission({{ $mission->mission_id }})">
                            Claim Reward
                        </a>
                    @else
                        <progress
                            class="progress"
                            value="{{ max(0, $currentProgress) }}"
                            max="{{ $mission->mission_statistic_amount }}"
                        ></progress>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
