<div class="serverlist">
    <div class="vertical-scroll">
        <div class="serverlist-grid">
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
            <div class="serverlist-grid-section">
                <div class="title"><i class="fa-solid fa-circle pulse"></i> 127.0.0.1:4977</div>
                <div class="description">Nuketown</div>
                <progress
                    class="progress"
                    value="4"
                    max="8"
                ></progress>
            </div>
        </div>
    </div>
</div>

<script>
    function animateServerlistProgressBars(root = document) {
        const bars = root.querySelectorAll(".serverlist progress.progress:not([data-animated])");

        bars.forEach(bar => {
            const target = parseFloat(bar.getAttribute("value"));
            bar.value = 0;

            const duration = 600;
            const startTime = performance.now();

            function animate(time) {
                const progress = Math.min((time - startTime) / duration, 1);
                bar.value = progress * target;

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    bar.value = target;
                }
            }

            requestAnimationFrame(animate);
            bar.dataset.animated = "true";
        });
    }

    document.addEventListener("DOMContentLoaded", () => { animateServerlistProgressBars(); });
    document.addEventListener("livewire:navigated", () => { animateServerlistProgressBars(); });
    document.addEventListener("livewire:updated", (event) => { animateServerlistProgressBars(event.target); });
    document.addEventListener("livewire:initialized", () => { animateServerlistProgressBars(); });
</script>
