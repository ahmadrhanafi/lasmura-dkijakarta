<?php if ($pager->hasPages()): ?>
    <nav class="flex justify-center gap-1">

        <?php if ($pager->hasPrevious()): ?>
            <a href="<?= $pager->getPreviousPage() ?>"
                class="px-3 py-1 border rounded">‹</a>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
            <a href="<?= $link['uri'] ?>"
                class="px-3 py-1 border rounded
           <?= $link['active'] ? 'bg-[#b91c1c] text-white' : '' ?>">
                <?= $link['title'] ?>
            </a>
        <?php endforeach ?>

        <?php if ($pager->hasNext()): ?>
            <a href="<?= $pager->getNextPage() ?>"
                class="px-3 py-1 border rounded">›</a>
        <?php endif ?>

    </nav>
<?php endif ?>