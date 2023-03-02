<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favourite[]|\Cake\Collection\CollectionInterface $favourites
 */
?>
<div class="favourites index content">
    <?= $this->Html->link(__('New Favourite'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Favourites') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="col-sm-1"><?= $this->Paginator->sort('favourites_id') ?></th>
                    <th class="col-sm-1"><?= $this->Paginator->sort('bookmarks_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favourites as $favourite): ?>
                <tr>
                    <td><?= $this->Number->format($favourite->favourites_id) ?></td>
                    <td><?= $favourite->has('bookmark') ? $this->Html->link($favourite->bookmark->bookmarks_id, ['controller' => 'Bookmarks', 'action' => 'view', $favourite->bookmark->bookmarks_id]) : '' ?></td>
                    <td class="actions">
                        <!-- 
                        <?= $this->Html->link(__('View'), ['action' => 'view', $favourite->favourites_id],['class'=>'button button-outline']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $favourite->favourites_id],['class'=>'button button-outline']) ?>
                         -->
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favourite->favourites_id], ['class'=>'button button-outline','confirm' => __('Are you sure you want to delete # {0}?', $favourite->favourites_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
