<div class="row">
    
    <div class="large-7 large-centered columns">
        <h1 class="subheader"><?php echo __('Change Password'); ?></h1>
    </div>       
    
    <div class="large-7 large-centered columns">
        
        <?php echo $this->Form->create('CatalogProduct',array(
            'url' => array('controller' => 'products','action' => 'edit','manager' => true,$id),
            'type' => 'file'
        )); ?>
        
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->input('product_name',array(
                    'label' => __('Your product name'),
                    'type' => 'text',
                    'div' => false,
                    'placeholder' => __('product name'),
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    ),
                    'value' => $product['CatalogProduct']['product_name']
                )); ?>                                
            </div>
        </div>
        
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->input('product_desc',array(
                    'label' => __('Your product description'),
                    'type' => 'textarea',
                    'div' => false,                    
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    ),
                    'value' => $product['CatalogProduct']['product_desc']
                )); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="large-4 columns">
                <?php echo $this->Form->input('product_price',array(
                    'label' => __('Your product price'),
                    'type' => 'text',
                    'div' => false,
                    'placeholder' => __('product price'),
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    ),
                    'value' => $product['CatalogProduct']['product_price']
                )); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->input('product_main_image',array(
                    'label' => __('Your product image'),
                    'type' => 'file',
                    'div' => false,                    
                    'error' => array(
                        'attributes'  => array('wrap' => 'small','class' => 'error')
                    ),
                    'value' => $product['CatalogProduct']['product_main_image']
                )); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="large-6 columns">
                <input type="submit" value="<?php echo __('Update'); ?>" class="button small" />
                <?php echo $this->Html->link(__('Back'),array(
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