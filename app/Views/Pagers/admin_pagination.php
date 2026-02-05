<?php $pager->setSurroundCount(2) ?>

<?php if ($pager->getPageCount() > 1): ?>
<nav class="flex items-center justify-center py-4" aria-label="Pagination">
    <ul class="inline-flex items-center -space-x-px gap-2">

        <?php if ($pager->hasPrevious()): ?>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>"
                   class="flex items-center justify-center w-10 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-200 rounded-xl hover:bg-gray-900 hover:text-white transition-all duration-300 group">
                    <span class="sr-only">Previous</span>
                    <i class="fa-solid fa-chevron-left text-[10px] group-hover:-translate-x-0.5 transition-transform"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php foreach ($pager->links() as $link): ?>
            <li>
                <a href="<?= $link['uri'] ?>"
                   class="flex items-center justify-center w-10 h-10 text-sm font-black uppercase tracking-tighter transition-all duration-300 rounded-xl border
                   <?= $link['active']
                        ? 'bg-[#b91c1c] text-white border-[#b91c1c] shadow-lg shadow-red-100'
                        : 'bg-white text-gray-400 border-gray-200 hover:border-gray-900 hover:text-gray-900' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <?php if ($pager->hasNext()): ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>"
                   class="flex items-center justify-center w-10 h-10 leading-tight text-gray-500 bg-white border border-gray-200 rounded-xl hover:bg-gray-900 hover:text-white transition-all duration-300 group">
                    <span class="sr-only">Next</span>
                    <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
<?php endif; ?>