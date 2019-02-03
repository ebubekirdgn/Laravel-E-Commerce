<!DOCTYPE html>
<html>

<head>
<title>Deneme Sayfası</title>
</head>

<body>

<h1>Anasayfa</h1>

<form METHOD="post" action="/kaydet">
    Adı : <input type="text" name="isim"/><br>
    Soyadı : <input type="text" name="soyadi"/><br>
    {{csrf_field()}}
    <input type="submit" value="Kaydet">
</form>
</body>
</html>
















