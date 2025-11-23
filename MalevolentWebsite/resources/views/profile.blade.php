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

                <img src="{{ Avatar::create('Dec')->setDimension(75)->setFontSize(18)->toBase64() }}"/>

                </div>
                <div>



                </div>
            </div>
        </div>

        <x-global.footer/>

    </body>
</html>
