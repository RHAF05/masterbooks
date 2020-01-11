<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto Creado</title>
</head>
<body>
    <h1>Nuevo producto creado</h1>
    <p>Se ha creado un nuevo producto y los datos son:</p>
    <p>Nombre: {{ $nombre }}</p>
    <p>Precio: {{ number_format($precio,2,',','.') }}</p>
</body>
</html>
