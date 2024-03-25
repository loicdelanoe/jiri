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
            <a href="/jiris" class="underline text-blue-500">← Annuler</a>
            <h1 class="text-3xl font-bold">Créer un nouveau jiri</h1>
        </div>
        <form action="/jiri" method="post" class="flex flex-col gap-4 items-start">
            <?php csrf_token() ?>
            <label for="name" class="font-bold mr-2">Nom du jiri :</label>
            <input class="border rounded-md p-2 w-full" type="text" name="name" id="name">
            <label for="starting_at" class="font-bold mr-2">Date de début :</label>
            <input class="border rounded-md p-2 mb-5 w-full" type="text" name="starting_at" id="starting_at">
            <button class="rounded-md bg-blue-500 text-white px-4 py-2" type="submit">Créer ce jiri</button>
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