<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
        <h1>Hello, {{ $name }}, {{ time() }} {{ isset($names) ? $names : 'Default' }}</h1>
    </body>
</html>
