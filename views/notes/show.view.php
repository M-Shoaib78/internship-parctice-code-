<?php view('partials/head.php', ['title' => $title]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-5">
            <a href="/notes" class="text-blue-500 underline">Go Back</a>
        </p>
        <p><?= htmlspecialchars($note['body'])  ?></p>
        <p class="mt-4">
            <a href="/note/edit?id=<?= $note['id'] ?>"
                class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
        </p>
        <!-- <form method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-red-500">Delete</button>
        </form> -->
    </div>
</main>
<?php view('partials/foot.php') ?>
