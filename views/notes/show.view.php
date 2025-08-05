<?php view('partials/head.php', ['title' => $title]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-5">
            <a href="/notes" class="text-blue-500 underline">Go Back</a>
        </p>
        <p><?= htmlspecialchars($note['body'])  ?></p>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-red-500">Delete</button>
        </form>
    </div>
</main>
<?php view('partials/foot.php') ?>
