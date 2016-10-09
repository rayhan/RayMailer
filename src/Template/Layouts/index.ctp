
<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <div class="actions">
        <?= $this->Html->link(__('Back to Teamplates'), ['controller' => 'Templates', 'action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button']) ?>
        <?= $this->Html->link(__('New Layout'), ['action' => 'add'], ['class' => 'btn btn-primary', 'role' => 'button']) ?>
    </div>
</nav>
<div class="layouts index large-9 medium-8 columns content">
    <h3><?= __('Layouts') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-general table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('is_locked') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($layouts as $layout): ?>
            <tr>
                <td><?= $this->Number->format($layout->id) ?></td>
                <td><?= h($layout->name) ?></td>
                <td><?= h($layout->description) ?></td>
                <td><?= h($layout->is_locked) ?></td>
                <td><?= h($layout->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $layout->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $layout->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
