<!DOCTYPE html>
<html>
    <head>
        <title>My AApp</title>
    </head>
        @if($user->isAdmin())
        <p>Welcome, admin!</p>
        @else
        <p>welcome, user!</p>
        @endif
    <body>
        <h1>Welcome to Laravel Blade</h1>
    </body>
</html>
