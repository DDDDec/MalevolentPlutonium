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

                    <x-content.login.form/>

                </div>
                <div>



                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
