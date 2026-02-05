<?php if ($pager->getPageCount() > 1): ?>

<nav class="flex justify-center mt-6">
    <ul class="inline-flex items-center space-x-1 text-sm">

        <!-- Previous -->
        <?php if ($pager->hasPrevious()): ?>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>"
                   class="px-3 py-2 border rounded hover:bg-gray-100">
                    «
                </a>
            </li>
        <?php endif; ?>

        <!-- Page Numbers -->
        <?php foreach ($pager->links() as $link): ?>
            <li>
                <a href="<?= $link['uri'] ?>"
                   class="px-3 py-2 border rounded
                   <?= $link['active']
                        ? 'bg-[#ea7e13] text-white border-[#ea7e13]'
                        : 'hover:bg-gray-100' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Next -->
        <?php if ($pager->hasNext()): ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>"
                   class="px-3 py-2 border rounded hover:bg-gray-100">
                    »
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav>

<?php endif; ?>
