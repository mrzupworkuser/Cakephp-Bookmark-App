<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks form content">
            <?= $this->Form->create($bookmark) ?>
            <fieldset>
                <legend><?= __('Add Bookmark') ?></legend>
                <div class="input select">
                    <label for="categories-id">Categories</label>
                    <select name="categories_id" id="categories-id">
                        <?php foreach ($categories_list as $category) : ?>
                            <option value=" <?= h($category->categories_id) ?>">
                                <?= h($category->categories_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php
                echo $this->Form->control('bookmarks_hash', ['value' => time(), 'label' => 'Timestamp Hash','required' => 'required','readonly' => 'readonly']);
                echo $this->Form->control('bookmarks_name',['required' => 'required']);
                echo $this->Form->control('bookmarks_url',['required' => 'required']);
                echo $this->Form->select('bookmarks_type', $bookmarks_types, ['required' => 'required', 'default' => 0]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>