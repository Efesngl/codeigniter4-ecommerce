<?php $pager->setSurroundCount(2) ?>

<nav class="pagination" aria-label="Page navigation">
    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="pagination__list">
                <a class="pagination__item--arrow  link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </li>
            <li class="pagination__list">
                <a class="pagination__item--arrow  link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                            </svg>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="pagination__list" >
                <a <?= $link['active'] ? 'class="pagination__item pagination__item--current"' : 'class="pagination__item link"' ?> " href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="pagination__list">
                <a class="pagination__item--arrow  link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                            </svg>
                </a>
            </li>
            <li class="pagination__list">
                <a class="pagination__item--arrow  link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>