<div class="server-statistics">
    <div class="vertical-scroll">
        <div class="server-statistics-grid">
            <div class="server-statistics-grid-section">
                <div class="title">Kills</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Revives</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Downs</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Headshots</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Boss Kills</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Missions</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Players</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Peak Players</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Chat Games</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Registered</div>
                <div class="description" data-target="10000">10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Traveled</div>
                <div class="description" data-target="10000">10,000km</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Gambled</div>
                <div class="description" data-target="10000">£10,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Circulating</div>
                <div class="description" data-target="100000">£100,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Dogs Killed</div>
                <div class="description" data-target="1000">1,000</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Servers Online</div>
                <div class="description" data-target="30">30</div>
            </div>
            <div class="server-statistics-grid-section">
                <div class="title">Interest</div>
                <div class="description" data-target="10000">£10,000</div>
            </div>
        </div>
    </div>
</div>

<script>
    function runStatisticCounters() {
        const counters = document.querySelectorAll(".server-statistics .description");

        counters.forEach(counter => {
            const target = parseFloat(counter.dataset.target);
            if (isNaN(target)) return;

            const originalText = counter.textContent.trim();
            const prefix = originalText.match(/^[^\d]+/)?.[0] || "";
            const suffix = originalText.match(/[^\d]+$/)?.[0] || "";

            const duration = 2000;
            const frameRate = 60;
            const totalFrames = Math.round(duration / (1000 / frameRate));
            let currentFrame = 0;

            const animate = () => {
                currentFrame++;
                const progress = currentFrame / totalFrames;
                const value = Math.floor(target * progress);

                counter.textContent = prefix + value.toLocaleString() + suffix;

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    counter.textContent = prefix + target.toLocaleString() + suffix;
                }
            };

            animate();
        });
    }

    document.addEventListener("DOMContentLoaded", runStatisticCounters);
    document.addEventListener("livewire:navigated", runStatisticCounters);
</script>
