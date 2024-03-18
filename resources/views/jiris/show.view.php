<?php
/** @var stdClass $jiri */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Jiris</title>
</head>
<body>
<div class="flex flex-col flex-col-reverse gap-4">
    <main class="flex flex-col gap-4 mx-4">
        <a class="underline text-blue-500" href="/jiris">← Retour aux Jiris</a>
        <h1 class="text-3xl font-bold"><?= $jiri->name ?></h1>
        <dl>
            <div>
                <dt class="font-bold">Nom :</dt>
                <dd><?= $jiri->name ?></dd>
            </div>
            <div>
                <dt class="font-bold">Date de début :</dt>
                <dd><?= $jiri->starting_at ?></dd>
            </div>
        </dl>
        <div>
            <a href="/jiri/edit?id=<?= $jiri->id ?>" class="underline text-blue-500">Modifier ce jiri</a>
        </div>
        <form action="/jiri/delete" method="post">
            <input type="hidden" name="id" value="<?= $jiri->id ?>">
            <button type="submit" class="text-red-500">Supprimer ce jiri</button>
        </form>
    </main>
    <nav class="bg-slate-600 p-4">
        <h2 class="sr-only">Menu principal</h2>
        <ul class="flex gap-4">
            <li><a class="text-white" href="/jiris">Jiris</a></li>
            <li><a class="text-white" href="/contacts">Contacts</a></li>
            <li><a class="text-white" href="/projects">Projets</a></li>
        </ul>
    </nav>
</div>
</body>
</html>