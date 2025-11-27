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

                    <livewire:content.account.account.avatar :user="$user"/>
                    <x-content.account.profile.mission/>
                    <x-content.account.profile.achievement/>

                </div>
                <div>

                    <x-content.account.profile.statistics/>
                    <x-content.account.profile.activity/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
