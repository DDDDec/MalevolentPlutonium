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

                    <x-content.account.register.form/>

                </div>
                <div>

                    <x-content.account.register.information/>

                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
