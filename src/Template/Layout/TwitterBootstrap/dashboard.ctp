<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->addCrumb(__('Dashboard'), ['controller' => 'users', 'action' => 'dashboard', 'plugin' => false]);

if ($this->request->action !== 'dashboard'): 
    $this->Html->addCrumb($this->request->controller, ['action' => 'index']);
    if ($this->request->action != 'index' && !$this->fetch('hide_breadcrumb_link')):
        $this->Html->addCrumb(Cake\Utility\Inflector::humanize($this->request->action), \Cake\Routing\Router::url(''));
    endif; 
endif; 


// $this->Html->addCrumb(__('Dashboard'), ['controller' => 'users', 'action' => 'dashboard']);                

if ($this->elementExists('tb_sidebar')):
    $this->start('tb_sidebar');
    echo $this->element('tb_sidebar');
    $this->end();
endif; 

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="navbar navbar-inverse navbar-app navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo \Cake\Routing\Router::url('/'); ?>">
                    <?= $this->Html->image(Configure::read('Org.Core.logo-icon'), ['alt' => 'Logo']); ?>
                    <?= Configure::read('App.title') ?>
                    
                </a>
                

            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right visible-xs">
                    <?= $this->fetch('tb_actions') ?>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->request->session()->read('Auth.User.id')): ?>
                        <li class="nav-divider"></li>
                        <li><?php echo $this->Html->link(__('Dashboard'), ['controller' => 'users', 'action' => 'dashboard', 'plugin' => false]); ?></li>
                        <li><?php echo $this->Html->link(__($this->request->session()->read('Auth.User.name')), 'javascript:void(true);'); ?></li>
                        <li><?php echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout', 'plugin' => false]); ?></li>
                    <?php else: ?>
                        <li><?php echo $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login', 'plugin' => false]); ?></li>
                    <?php endif; ?>
                </ul>
                
                <!-- <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form> -->
                
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            
            <?php if (!$this->fetch('hide_breadcrumb')): ?>
                <?php echo $this->Html->getCrumbList(['escape' => false], ' <span class="fa fa-home"></span> '); ?>
            <?php endif; ?>

            <?php 
                if (!$this->fetch('page_header')) {

                    if (!$this->fetch('page_title')) {
                        $this->assign('page_title', $this->request->controller);
                    }

                    $this->start('page_header');
                        echo '<h1 class="page-header">' . $this->fetch('page_title') . '</h1>';
                    $this->end('page_header');
                }

                echo $this->fetch('page_header');
                
            ?>

<?php


/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');
