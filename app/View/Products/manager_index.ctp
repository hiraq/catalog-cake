<?php
$this->Paginator->options(array(
    'url' => ''
));
?>
<div class="row">
    
    <div class="large-7 large-centered columns">
        <h1 class="subheader"><?php echo __('Products'); ?></h1>
    </div>               
    
</div>

<div class="row">
    <div class="large-7 large-centered columns">
        <?php echo $this->Html->link(__('Add'),array('controller' => 'products','action' => 'add','manager' => true),array(
            'class' => 'button small secondary'
        )); ?>
        <?php echo $this->Session->flash('success',array('element' => 'notif_success')); ?>
        <table>
            <thead>
                <tr>
                    <th width="400"><?php echo __('Product name'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['CatalogProduct']['product_name']; ?></td>
                    <td>
                        <?php echo $this->Html->link(__('Edit'),array('controller' => 'products','action' => 'edit','manager' => true,$product['CatalogProduct']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'),
                                array('controller' => 'products','action' => 'delete','manager' => true,$product['CatalogProduct']['id']),
                                array(),
                                __('Are you sure want to delete this product?')); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>  
</div>

<div class="row">
    <div class="large-7 large-centered columns">
        <ul class="pagination">
            <?php echo $this->Paginator->numbers(array(
                'tag' => 'li',
                'separator' => '',
                'currentTag' => 'a'
            )); ?>
        </ul>
    </div>
</div>