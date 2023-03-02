<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bookmark'), ['action' => 'edit', $bookmark->bookmarks_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bookmark'), ['action' => 'delete', $bookmark->bookmarks_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->bookmarks_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bookmark'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks view content">
            <h3><?= h($bookmark->bookmarks_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $bookmark->has('category') ? $this->Html->link($bookmark->category->categories_id, ['controller' => 'Categories', 'action' => 'view', $bookmark->category->categories_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Bookmarks Hash') ?></th>
                    <td><?= h($bookmark->bookmarks_hash) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bookmarks Name') ?></th>
                    <td><?= h($bookmark->bookmarks_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bookmarks Id') ?></th>
                    <td><?= $this->Number->format($bookmark->bookmarks_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bookmarks Type') ?></th>
                    <td><?= $bookmark->bookmarks_type ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Bookmarks Url') ?></strong>
                <blockquote>
                    <?php if (substr_count($bookmark->bookmarks_url, "http") <> 1) :
                        $arrUrls = explode("\n", $bookmark->bookmarks_url); ?>
                        <?php foreach ($arrUrls as $url) : ?>
                            <a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a><br/>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <a href="<?= h($bookmark->bookmarks_url); ?>" target="_blank">
                            <?= $this->Text->autoParagraph(h($bookmark->bookmarks_url)); ?>
                        </a>
                    <?php endif; ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>