<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Add Category') ?></legend>

                <div class="input select">
                    <label for="categories_parent">Categories Parent</label>
                    <select name="categories_parent" id="categories_parent">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= h($category->categories_id) ?>">
                                <?= h($category->categories_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php
                    echo $this->Form->control('categories_name',['required' => 'required']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>