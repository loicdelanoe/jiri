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
        <a class="underline text-blue-500" href="/jiri?id=<?= $jiri->id ?>">← Annuler la modification</a>
        <h1 class="text-3xl font-bold"><?= $jiri->name ?></h1>
        <form action="/jiri/update" method="post" class="flex flex-col gap-4 items-start">
            <input type="hidden" name="id" value="<?= $jiri->id ?>">
            <div>
                <label for="name" class="font-bold mr-2">Nom du jiri :</label>
                <input class="border rounded-md px-2" type="text" name="name" id="name" value="<?= $jiri->name ?>">
            </div>
            <div>
                <label for="starting_at" class="font-bold mr-2">Date de début :</label>
                <input class="border rounded-md px-2" type="text" name="starting_at" id="starting_at" value="<?= $jiri->starting_at ?>">
            </div>
            <button class="rounded-md bg-blue-500 text-white px-4" type="submit">Modifier ce jiri</button>
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