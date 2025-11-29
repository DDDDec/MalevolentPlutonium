<div class="achievement" wire:poll.visible>
    <div class="vertical-scroll">
        <div class="achievement-grid">
            @foreach($achievements as $achievement)
                <div class="achievement-grid-section">
                    <div class="title"><i class="fa-solid fa-circle pulse"></i> {{ $achievement->achievement_name }}</div>
                    <div class="description">{{ $achievement->achievement_description ?? '' }}</div>
                    @php
                        $currentProgress = $userStatistics?->{$achievement->achievement_statistic_name} ?? 0;
                    @endphp
                    <progress
                        class="progress"
                        value="{{ $currentProgress }}"
                        max="{{ $achievement->achievement_amount }}"
                    ></progress>
                </div>
            @endforeach
        </div>
    </div>
</div>
