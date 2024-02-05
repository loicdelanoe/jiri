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
        <h1>Les Jiris</h1>
        <section>
            <h2>Jiri à venir</h2>
            <ol>
                <?php foreach ($jiris as ): ?>
                    <li><a class="text-blue-500 underline" href="/jiris/1">Projets Web 2025</a></li>
                <?php endforeach; ?>
            </ol>
        </section>
        <section>
            <h2>Jiri passés</h2>
            <ol>
                <li><a class="text-blue-500 underline" href="/jiris/3">Projets Web 2024</a></li>
                <li><a class="text-blue-500 underline" href="/jiris/4">Design Web 2023</a></li>
            </ol>
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