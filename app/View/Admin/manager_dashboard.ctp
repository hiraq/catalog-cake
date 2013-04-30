<div class="row">
    
    <div class="large-6 large-centered columns">
        <h1 class="subheader"><?php echo __('Catalog Dashboard'); ?></h1>
    </div>       
    
</div>

<div class="row">
    
    <div class="large-6 large-centered columns">
        <a href="#" data-dropdown="action1" class="button small">
            <?php echo __('Products'); ?>
        </a>
        <a href="#" data-dropdown="action2" class="button small">
            <?php echo __('Contacts'); ?>
        </a>
        <a href="#" data-dropdown="action3" class="button small">
            <?php echo __('Admin'); ?>
        </a>        
        
        <ul id="action1" class="f-dropdown" data-dropdown-content>
            <li>
                <?php echo $this->Html->link(__('Manage'),array('controller' => 'products','action' => 'index','manager' => true)); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('Add'),array('controller' => 'products','action' => 'add','manager' => true)); ?>
            </li>
        </ul>
        
        <ul id="action2" class="f-dropdown" data-dropdown-content>
            <li>
                <?php echo $this->Html->link(__('Manage'),array('controller' => 'contacts','action' => 'index','manager' => true)); ?>
            </li>            
        </ul>
        
        <ul id="action3" class="f-dropdown" data-dropdown-content>
            <li>
                <?php echo $this->Html->link(__('Update Password'),array('controller' => 'users','action' => 'change_password','manager' => true)); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('Logout'),array('controller' => 'users','action' => 'logout','manager' => true)); ?>
            </li>
        </ul>
    </div>
    
</div>