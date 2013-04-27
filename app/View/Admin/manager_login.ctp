<div class="row">

    <div class="large-6 large-centered columns">


        <?php echo $this->Form->create('CatalogUser',array(
            'url' => array('controller' => 'admin','action' => 'login','manager' => true)
        )); ?>
        
            <fieldset>
                <legend><?php echo __('Login Admin'); ?></legend>

                <div class="row">
                    <div class="large-12 columns">
                        <?php echo $this->Form->input('username',array(
                            'label' => __('User name'),
                            'div' => false,
                            'type' => 'text',
                            'placeholder' => __('your username')
                        )); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <?php echo $this->Form->input('password',array(
                            'label' => __('Password'),
                            'div' => false,
                            'type' => 'password',
                            'placeholder' => __('your password')
                        )); ?>
                    </div>                    
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" class="button small round" value="<?php echo __('Login'); ?>" />
                    </div>
                </div>
                
                <?php if (isset($login_error) && $login_error) : echo $this->Session->flash('auth',array('element' => 'notif_failure')); endif ?>                                

            </fieldset>
        <?php echo $this->Form->end(); ?>

    </div>

</div>