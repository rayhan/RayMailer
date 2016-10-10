
<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <div class="actions">
        <?= $this->Html->link(__('New Template'), ['action' => 'add'], ['class' => 'btn btn-primary', 'role' => 'button']) ?>
        <?= $this->Html->link(__('Layouts'), ['controller' => 'Layouts', 'action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button']) ?>
    </div>
</nav>
<div class="templates index large-9 medium-8 columns content">
    <h3><?= __('Templates') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-general table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('slug') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('raymailer_layout_id', __('Layout')) ?></th>
                <th><?= $this->Paginator->sort('transport') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($templates as $template): ?>
            <tr>
                <td><?= $this->Number->format($template->id) ?></td>
                <td><?= h($template->name) ?></td>
                <td><?= h($template->slug) ?></td>
                <td><?= h($template->subject) ?></td>
                <td><?= $template->has('layout') ? $this->Html->link($template->layout->name, ['controller' => 'Layouts', 'action' => 'view', $template->layout->id]) : '' ?></td>
                <td><?= h($template->transport) ?></td>
                <td><?= h($template->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $template->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $template->id]) ?>
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
