<nav class="text-sm text-gray-500 ml-6 mt-6" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2">
        <?php foreach ($breadcrumb as $i => $item): ?>
            <li class="flex items-center space-x-2">

                <?php if (isset($item['url'])): ?>
                    <a href="<?= $item['url'] ?>"
                       class="flex items-center gap-2 hover:text-[#b91c1c]">

                        <?php if (isset($item['icon'])): ?>
                            <i class="<?= esc($item['icon']) ?> text-xs"></i>
                        <?php endif; ?>

                        <span><?= esc($item['label']) ?></span>
                    </a>
                <?php else: ?>
                    <span class="flex items-center gap-1 text-gray-700 font-medium">

                        <?php if (isset($item['icon'])): ?>
                            <i class="<?= esc($item['icon']) ?> text-xs"></i>
                        <?php endif; ?>

                        <?= esc($item['label']) ?>
                    </span>
                <?php endif; ?>

                <?php if ($i < count($breadcrumb) - 1): ?>
                    <i class="fa-solid fa-chevron-right text-xs opacity-50"></i>
                <?php endif; ?>

            </li>
        <?php endforeach; ?>
    </ol>
</nav>
