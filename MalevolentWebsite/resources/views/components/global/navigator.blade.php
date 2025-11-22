<nav>
    <div class="container">
        <div class="navigator">
            <div>
                <a href="/" wire:navigate><li>Homepage</li></a>
                <a href="/store" wire:navigate><li>Store</li></a>
            </div>
            <div>
                <div class="menu">
                    <a><li>Account <i class="fa-solid fa-angle-up"></i></li></a>
                    <div class="menu-content">
                        <a href="/login" wire:navigate><li><i class="fa-solid fa-right-to-bracket"></i> Login</li></a>
                        <a href="/register" wire:navigate><li><i class="fa-solid fa-user-plus"></i> Register</li></a>
                        <div class="divider"></div>
                        <a href="/forgot" wire:navigate><li><i class="fa-solid fa-key"></i> Forgot Password</li></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
