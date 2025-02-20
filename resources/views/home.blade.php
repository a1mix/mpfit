<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center mt-5">
    <h1>Добро пожаловать в магазин!</h1>
    <p>Выберите раздел для работы:</p>
    <div class="d-grid gap-3 col-6 mx-auto">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Управление товарами</a>
        <a href="{{ route('orders.index') }}" class="btn btn-success btn-lg">Управление заказами</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
