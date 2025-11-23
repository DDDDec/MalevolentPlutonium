<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-global.head/>
    </head>
    <body>

        <x-global.background/>
        <x-global.navigator/>
        <x-global.header/>

        <div class="container">
            <div class="content">
                <div>

                    <x-content.homepage.newspaper/>
                    <livewire:content.homepage.serverlist/>
                    <x-content.homepage.features/>
                    <x-content.homepage.server-statistics/>

                </div>
                <div>

                    <x-content.homepage.player-actions/>
                    <x-content.homepage.server-actions/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
