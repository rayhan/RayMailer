

<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <div class="actions">
        <?= $this->Html->link(__('Back to Layouts'), ['action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button']) ?> 
        <?= $this->Html->link(__('Edit Layout'), ['action' => 'edit', $layout->id], ['class' => 'btn btn-default', 'role' => 'button']) ?> 
        <?= $this->Form->postLink(__('Delete Layout'), ['action' => 'delete', $layout->id], ['class' => 'btn btn-danger', 'role' => 'button', 'confirm' => __('Are you sure you want to delete # {0}?', $layout->id)]) ?> 
        <?= $this->Html->link(__('New Layout'), ['action' => 'add'], ['class' => 'btn btn-primary', 'role' => 'button']) ?> 
    </div>
</nav>
<div class="layouts view large-9 medium-8 columns content">
    <h3><?= h($layout->name) ?></h3>
    <table class="vertical-table table table-bordered table-hover">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($layout->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($layout->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($layout->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($layout->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Sender Name') ?></th>
            <td><?= h($layout->sender_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sender Email') ?></th>
            <td><?= h($layout->sender_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Reply To') ?></th>
            <td><?= h($layout->reply_to) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($layout->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($layout->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($layout->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($layout->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Locked') ?></th>
            <td><?= $layout->is_locked ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($layout->body)); ?>
    </div>
    
    <div class="related">
        <h4><?= __('Related Templates') ?></h4>
        <?php if (!empty($layout->templates)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-general table-bordered table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Subject') ?></th>
                <th><?= __('Transport') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($layout->templates as $templates): ?>
            <tr>
                <td><?= h($templates->id) ?></td>
                <td><?= h($templates->name) ?></td>
                <td><?= h($templates->slug) ?></td>
                <td><?= h($templates->subject) ?></td>
                <td><?= h($templates->transport) ?></td>
                <td><?= h($templates->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Templates', 'action' => 'view', $templates->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
