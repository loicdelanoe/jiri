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
<div class="flex flex-col flex-col-reverse gap-4 container mx-auto">
    <main class="flex flex-col gap-4">
        <h1 class="text-3xl font-bold">Les Jiris</h1>
        <section>
            <h2 class="text-xl font-bold mb-2">Jiri à venir</h2>
            <?php if (count($upcoming_jiris) > 0): ?>
                <ol>
                    <?php foreach ($upcoming_jiris as $jiri): ?>
                        <li class="mb-1">
                            <a class="text-blue-500 underline" href="/jiris/<?= $jiri['id'] ?>"><?= $jiri['name'] ?></a>
                            <p class="text-sm"><?= date('j F o', strtotime($jiri['date'])) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else: ?>
                <p>Il n'y a pas de jiri à venir</p>
            <?php endif; ?>
        </section>
        <section>
            <h2 class="text-xl font-bold mb-2">Jiri passés</h2>
            <?php if (count($passed_jiris) > 0): ?>
                <ol>
                    <?php foreach ($passed_jiris as $jiri): ?>
                        <li class="mb-1">
                            <a class="text-blue-500 underline" href="/jiris/<?= $jiri['id'] ?>"><?= $jiri['name'] ?></a>
                            <p class="text-sm"><?= date('j F o', strtotime($jiri['date'])) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else: ?>
                <p>Il n'y a pas de jiri archivés</p>
            <?php endif; ?>
        </section>
    </main>
    <nav>
        <h2 class="sr-only">Menu principal</h2>
        <ul class="flex gap-4">
            <li><a href="/jiris">Jiris</a></li>
            <li><a href="/contacts">Contacts</a></li>
            <li><a href="/projects">Projets</a></li>
        </ul>
    </nav>
</div>
</body>
</html>