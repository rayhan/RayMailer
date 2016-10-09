

<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <div class="actions">
        <?= $this->Html->link(__('Back to Templates'), ['action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button']) ?> 
        <?= $this->Html->link(__('Edit Template'), ['action' => 'edit', $template->id], ['class' => 'btn btn-default', 'role' => 'button']) ?> 
        <?= $this->Form->postLink(__('Delete Template'), ['action' => 'delete', $template->id], ['class' => 'btn btn-danger', 'role' => 'button', 'confirm' => __('Are you sure you want to delete # {0}?', $template->id)]) ?> 
        <?= $this->Html->link(__('New Template'), ['action' => 'add'], ['class' => 'btn btn-primary', 'role' => 'button']) ?> 
    </div>
</nav>
<div class="templates view large-9 medium-8 columns content">
    <h3><?= h($template->name) ?></h3>
    <table class="vertical-table table table-bordered table-hover">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($template->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($template->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($template->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Sender Name') ?></th>
            <td><?= h($template->sender_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sender Email') ?></th>
            <td><?= h($template->sender_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Reply To') ?></th>
            <td><?= h($template->reply_to) ?></td>
        </tr>
        <tr>
            <th><?= __('Layout') ?></th>
            <td><?= $template->has('layout') ? $this->Html->link($template->layout->name, ['controller' => 'Layouts', 'action' => 'view', $template->layout->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Transport') ?></th>
            <td><?= h($template->transport) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($template->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($template->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($template->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($template->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Locked') ?></th>
            <td><?= $template->is_locked ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($template->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Default') ?></h4>
        <?= $this->Text->autoParagraph(h($template->default)); ?>
    </div>
    <div class="related">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($template->notes)); ?>
    </div>
</div>
