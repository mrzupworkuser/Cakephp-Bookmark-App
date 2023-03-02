<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookmark->bookmarks_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->bookmarks_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks form content">
            <?= $this->Form->create($bookmark) ?>
            <fieldset>
                <legend><?= __('Edit Bookmark') ?></legend>

                <div class="input select">
                    <label for="categories-id">Categories</label>
                    <select name="categories_id" id="categories-id">
                        <?php foreach ($categories_list as $category) : ?>
                            <option value=" <?= h($category->categories_id) ?>" <?php if ($bookmark->categories_id == $category->categories_id) {
                                                                                    echo "selected";
                                                                                } ?>>
                                <?= h($category->categories_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php
                echo $this->Form->control('bookmarks_hash', ['required' => 'required']);
                echo $this->Form->control('bookmarks_name', ['required' => 'required']);
                echo $this->Form->control('bookmarks_url', ['required' => 'required']);
                echo $this->Form->control('bookmarks_type', ['options' => $bookmarks_types, 'required' => 'required']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>