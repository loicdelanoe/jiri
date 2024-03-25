<?php
/** @var array $upcoming_jiris */
/** @var array $passed_jiris */
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
            <h1 class="text-3xl font-bold">Les Jiris</h1>
            <form action="/">
                <label class="mr-3" for="search">Votre mot de recherche :</label>
                <input class="border rounded-md p-2" type="text" name="search" id="search">
                <button class="rounded-md bg-blue-500 text-white py-2 px-4" type="submit">Rechercher</button>
            </form>
        </div>
        <div class="flex gap-5 justify-between mb-5">
            <section class="border rounded-md min-w-96 p-6">
                <h2 class="text-xl font-bold mb-2">Jiri à venir</h2>
                <?php if (count($upcoming_jiris) > 0): ?>
                    <ol>
                        <?php foreach ($upcoming_jiris as $jiri): ?>
                            <li class="mb-1">
                                <a class="text-blue-500 underline" href="/jiri?id=<?= $jiri->id ?>"><?= $jiri->name ?></a>
                                <p class="text-sm"><?= date('j F o', strtotime($jiri->starting_at)) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php else: ?>
                    <p>Il n'y a pas de jiri à venir</p>
                <?php endif; ?>
            </section>
            <section class="border rounded-md min-w-96 p-6">
                <h2 class="text-xl font-bold mb-2">Jiri passés</h2>
                <?php if (count($passed_jiris) > 0): ?>
                    <ol>
                        <?php foreach ($passed_jiris as $jiri): ?>
                            <li class="mb-1">
                                <a class="text-blue-500 underline" href="/jiri?id=<?= $jiri->id ?>"><?= $jiri->name ?></a>
                                <p class="text-sm"><?= date('j F o', strtotime($jiri->starting_at)) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php else: ?>
                    <p>Il n'y a pas de jiri archivés</p>
                <?php endif; ?>
            </section>
        </div>
        <div>
            <a href="/jiri/create" class="underline text-blue-500">+ Créer un nouveau Jiri</a>
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