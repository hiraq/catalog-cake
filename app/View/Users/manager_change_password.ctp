<div class="row">
    
    <div class="large-7 large-centered columns">
        <h1 class="subheader"><?php echo __('Change Password'); ?></h1>
    </div>       
    
    <div class="large-7 large-centered columns">
        
        <?php echo $this->Form->create('CatalogUser',array(
            'url' => array('controller' => 'users','action' => 'change_password','manager' => true)
        )); ?>
        
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->input('password',array(
                    'label' => __('Current Password'),
                    'type' => 'password',
                    'div' => false,
                    'placeholder' => __('your current password'),
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    )
                )); ?>                                
            </div>
        </div>
        
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->input('password_new',array(
                    'label' => __('New Password'),
                    'type' => 'password',
                    'div' => false,
                    'placeholder' => __('your new password'),
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    )
                )); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->input('password_new_confirm',array(
                    'label' => __('Confirm new password'),
                    'type' => 'password',
                    'div' => false,
                    'placeholder' => __('confirm your new password'),
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    )
                )); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="large-6 columns">
                <input type="submit" value="<?php echo __('Update'); ?>" class="button small" />
                <?php echo $this->Html->link(__('Cancel'),array(
                    'controller' => 'admin',
                    'action' => 'dashboard',
                    'manager' => true,
                )); ?>
            </div>
        </div>
        
        <?php echo $this->Session->flash('failure',array('element' => 'notif_failure')); ?>
        <?php echo $this->Session->flash('success',array('element' => 'notif_success')); ?>
        
        <?php echo $this->Form->end(); ?>
        
    </div>
    
</div>