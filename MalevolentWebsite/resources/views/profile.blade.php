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

                    <livewire:content.account.profile.avatar :name="$name"/>
                    <livewire:content.account.profile.achievement :name="$name"/>

                </div>
                <div>

                    <livewire:content.account.profile.statistics :name="$name"/>
                    <livewire:content.account.profile.activity :name="$name"/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
