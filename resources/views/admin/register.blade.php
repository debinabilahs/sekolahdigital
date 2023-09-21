<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h2>Registrasi</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="status">Status:</label>
        <select name="status">
            <option value="active">Aktif</option>
            <option value="inactive">Nonaktif</option>
        </select><br><br>

        <label for="level">Level:</label>
        <select name="level">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <label for="blokir">Blokir:</label>
<input type="checkbox" name="blokir" value="Y"> Ya<br>
<input type="checkbox" name="blokir" value="N"> Tidak<br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
