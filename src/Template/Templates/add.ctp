
<?php 
    $this->extend('/Layout/TwitterBootstrap/dashboard'); 
    $this->assign('page_title', __('Add Template'))    
?>

<nav class="large-3 medium-4 columns form-nav-actions" id="actions-sidebar">
    <div class="actions">

        <?= $this->Html->link(__('Back to Templates'), ['action' => 'index'], ['class' => 'btn btn-default', 'role' => 'button']) ?>
            </div>
</nav>

<div class="templates form large-9 medium-8 columns content">
    <?= $this->Form->create($template) ?>


    <div class="form-tabs">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab-info" aria-controls="home" role="tab" data-toggle="tab"><?= __('Template Info') ?></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab-info">
                <fieldset>
                    <?php
                                    echo $this->Form->input('name');
                                    echo $this->Form->input('slug');
                                    echo $this->Form->input('raymailer_layout_id', ['options' => $layouts, 'empty' => true]);
                                    echo $this->Form->input('subject');
                                    echo $this->Form->input('body');
                                    echo $this->Form->input('default');
                                    echo $this->Form->input('sender_name');
                                    echo $this->Form->input('sender_email');
                                    echo $this->Form->input('reply_to');
                                    echo $this->Form->input('is_locked');
                                    echo $this->Form->input('transport');
                                    echo $this->Form->input('notes');
                                    echo $this->Form->input('status', ['options' => ['Draft' => 'Draft', 'Active' => 'Active', 'Inactive' => 'Inactive']]);
                                ?>
                </fieldset>
            </div>
        </div>
    </div>


    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
