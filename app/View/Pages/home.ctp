<?php
$this->Paginator->options(array(
    'url' => ''
));
?>
<div class="row">
    <div class="large-9 large-centered columns">
        <h1 class="subheader"><?php echo __('Products'); ?></h1>
    </div>     
</div>

<div class="row">
    <div class="large-9 large-centered columns">
        <ul class="small-block-grid-2 large-block-grid-4">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <li>
                        <?php echo $this->Html->link($this->Html->image('products/'.$product['CatalogProduct']['product_main_image'],array(
                            'class' => 'th'
                        )),'/products/view/'.$product['CatalogProduct']['id'],array('escape' => false)); ?>
                        <small>
                            <strong>
                                <?php echo __('Harga: ').$this->Number->currency($product['CatalogProduct']['product_price'],'Rp '); ?>
                            </strong>
                        </small>
                    </li>
                <?php endforeach; ?>
            <?php else:  ?>
            <h3><?php echo __('No products now'); ?></h3>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="row">
    <div class="large-9 large-centered columns">
        <ul class="pagination">
            <?php echo $this->Paginator->numbers(array(
                'tag' => 'li',
                'separator' => '',
                'currentTag' => 'a'
            )); ?>
        </ul>
    </div>
</div>

<?php echo $this->append('after_content'); ?>
<?php echo $this->element('footer'); ?>
<?php echo $this->end(); ?>