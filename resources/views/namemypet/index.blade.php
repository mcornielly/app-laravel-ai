<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel | OpenAI Quickstart</title>
    <link rel="shortcut icon" href="/images/dog.png"/>
    @vite(['resources/css/app.css'])
</head>
<body>
    <img src="/images/dog.png" alt="icon">
    <h3>Name My Pet</h3>
    <form action="{{ route('namemypet') }}" method="POST">
        @csrf
        <input type="text" name="animal" placeholder="Enter an animal" required />
        <input type="submit" value="Generate names" />
    </form>
    <div class="result">{{ $result }}</div>
</body>
</html>
