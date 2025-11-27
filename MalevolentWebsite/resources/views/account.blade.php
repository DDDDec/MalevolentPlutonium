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
                    <livewire:content.account.account.mission :user="$user"/>
                    <livewire:content.account.account.achievement :user="$user"/>

                </div>
                <div>

                    <livewire:content.account.account.statistics :user="$user"/>
                    <livewire:content.account.account.activity :user="$user"/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
