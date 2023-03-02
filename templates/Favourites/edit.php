<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favourite $favourite
 * @var string[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $favourite->favourites_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $favourite->favourites_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Favourites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="favourites form content">
            <?= $this->Form->create($favourite) ?>
            <fieldset>
                <legend><?= __('Edit Favourite') ?></legend>
                <?php
                    echo $this->Form->control('bookmarks_id', ['options' => $bookmarks]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
