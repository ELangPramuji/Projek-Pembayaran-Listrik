<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="/registrasi" method="post">
        @csrf
        <label for="">Username</label>
        <input type="text" id="username" name="name"><br>

        <label for="">Password</label>
        <input type="password" id="password" name="password"><br>

        <label for="">Email</label>
        <input type="email" id="email" name="email"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>