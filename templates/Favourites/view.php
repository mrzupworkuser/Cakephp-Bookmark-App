<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favourite $favourite
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Favourite'), ['action' => 'edit', $favourite->favourites_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Favourite'), ['action' => 'delete', $favourite->favourites_id], ['confirm' => __('Are you sure you want to delete # {0}?', $favourite->favourites_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Favourites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Favourite'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="favourites view content">
            <h3><?= h($favourite->favourites_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Bookmark') ?></th>
                    <td><?= $favourite->has('bookmark') ? $this->Html->link($favourite->bookmark->bookmarks_id, ['controller' => 'Bookmarks', 'action' => 'view', $favourite->bookmark->bookmarks_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Favourites Id') ?></th>
                    <td><?= $this->Number->format($favourite->favourites_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
