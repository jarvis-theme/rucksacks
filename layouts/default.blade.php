<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::place('title') }}</title>
        <meta charset="utf-8">
        {{ Theme::partial('seostuff') }} 
        {{ Theme::partial('defaultcss') }} 
        <link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>
        {{ Theme::asset()->styles() }} 
    </head>
    <body class="boxed">
        <div id="template-wrapper" class="boxed">
            {{ Theme::partial('header') }} 
            <div id="site-wrapper">
                {{ Theme::place('content') }} 
            </div>
            {{ Theme::partial('footer') }} 
        </div>
    </body>
    {{ Theme::partial('defaultjs') }} 
    {{ Theme::partial('analytic') }} 
</html>