<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($planta->id) ? "Editar Planta" : "Nova Planta" ?></title>
    <link rel="stylesheet" href="/mvcPlantas/app/views/css/form.css">

</head>
<body>
    <h1><?= isset($planta->id) ? "Editar Planta" : "Nova Planta" ?></h1>

    <form action="/mvcPlantas/planta/salvar" method="post">
        <input type="hidden" name="id" value="<?= $planta->id ?? '' ?>">

        <label>Nome Científico:</label><br>
        <input type="text" name="nome_cientifico" value="<?= $planta->nome_cientifico ?? '' ?>" required><br><br>

        <label>Nome Popular:</label><br>
        <input type="text" name="nome_popular" value="<?= $planta->nome_popular ?? '' ?>"><br><br>

        <button type="submit">Salvar</button>
    </form>

    <p><a href="/mvcPlantas/planta">Voltar à lista</a></p>
</body>
</html>
