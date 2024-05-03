<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha de Molde "OtroMundo"</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 5px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ficha de Molde "OtroMundo"</h1>

        <table>
            <tr>
                <th>Código de molde:</th>
                <td>{{$mold->model}}</td>
            </tr>
            <tr>
                <th>Nombre del molde:</th>
                <td>{{$mold->name}}</td>
            </tr>
            <tr>
                <th>Descripción del diseño:</th>
                <td>{{$mold->description}}</td>
            </tr>
            <tr>
                <th>Material:</th>
                <td>{{$mold->materials}}</td>
            </tr>
        </table>

        <h2>Imágenes</h2>

        <div style="text-align: center;">
            <img src="data:image/png;base64,{{$encodedImage}}" alt="Fotografía del molde">
        </div>
    </div>
    <footer>
        <p>&copy; {{ now()->year }} Powered by Nucleox</p>
    </footer>
</body>
</html>
