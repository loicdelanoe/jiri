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
    <main class="flex flex-col gap-4 mx-auto max-w-screen-xl pt-5">
        <div class="flex items-center gap-10 mb-5 justify-between">
            <a class="underline text-blue-500" href="/jiris">← Retour aux Jiris</a>
            <h1 class="text-3xl font-bold"><?= $jiri->name ?></h1>
        </div>
        <dl class="mb-5">
            <div class="mb-3">
                <dt class="font-bold">Nom :</dt>
                <dd><?= $jiri->name ?></dd>
            </div>
            <div>
                <dt class="font-bold">Date de début :</dt>
                <dd><?= $jiri->starting_at ?></dd>
            </div>
        </dl>
        <div class="flex gap-10 items-center">
            <a href="/jiri/edit?id=<?= $jiri->id ?>" class="underline text-blue-500">Modifier ce jiri</a>
            <form action="/jiri" method="post">
                <?php csrf_token(); ?>
                <?php method('delete'); ?>
                <input type="hidden" name="id" value="<?= $jiri->id ?>">
                <button type="submit" class="text-white bg-red-500 px-4 py-2 rounded-md">Supprimer ce jiri</button>
            </form>
        </div>
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