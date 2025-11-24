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

                    <livewire:content.homepage.newspaper/>
                    <livewire:content.homepage.serverlist/>
                    <livewire:content.homepage.features/>
                    <livewire:content.homepage.statistics/>

                </div>
                <div>

                    <livewire:content.homepage.player-actions/>
                    <livewire:content.homepage.server-actions/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
