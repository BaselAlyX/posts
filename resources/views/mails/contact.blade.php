<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamada Email</title>
</head>
<body>
    <h1>{{$data['name']}}</h1>
    <h1>{{$data['email']}}</h1>
    <p>{{$data['message']}}</p>

</body>
</html>


<!-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> -->
