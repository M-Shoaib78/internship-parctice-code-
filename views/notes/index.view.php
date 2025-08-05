<?php view('partials/head.php', ['title' => $title]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>">
                        <?= htmlspecialchars($note['body'])  ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="mt-5">
            <a href="/note/create" class="text-blue-500 hover:underline">Create New Note</a>
        </p>
    </div>
</main>
<?php view('partials/foot.php') ?>