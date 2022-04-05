<?php use_stylesheet('jobs.css'); ?>

<?php slot('title', sprintf('Jobs in the %s category', $category->getName())) ?>

<div class="category">
    <div class="feed">
        <a href="<?php echo url_for('category', array('sf_subject' => $category, 'sf_format' => 'atom')) ?>">Feed</a>
    </div>
    <h1><?= $category ?></h1>
</div>

<?php include_partial('job/list', array('jobs' => $category->getActiveJobs())); ?>

<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <a href="<?= url_for('category', $category) ?>?page=1">
            <img src="/images/first.png" alt="First page" title="First page" />
        </a>

        <a href="<?= url_for('category', $category) ?>?page=<?= $pager->getPreviousPage() ?>">
            <img src="/images/previous.png" alt="Previous page" title="Previous page" />
        </a>

        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?= url_for('category', $category) ?>?page=<?= $page ?>"><?= $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getNextPage() ?>">
            <img src="/images/next.png" alt="Next page" title="Next page" />
        </a>

        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getLastPage() ?>">
            <img src="/images/last.png" alt="Last page" title="Last page" />
        </a>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo $pager->getNbResults() ?></strong> jobs in this category

    <?php if ($pager->haveToPaginate()): ?>
        - page <strong><?= $pager->getPage() ?>/<?= $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>