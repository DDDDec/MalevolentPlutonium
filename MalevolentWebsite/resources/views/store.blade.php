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

                    <livewire:content.store.colors/>
                    <livewire:content.store.ranks/>

                </div>
                <div>

                    <livewire:content.store.wallet/>
                    <livewire:content.store.purchases/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
