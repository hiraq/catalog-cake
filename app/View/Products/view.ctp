<div class="row">
    <div class="large-9 large-centered columns">
        <h1 class="subheader"><?php echo __('Detail Product: ').$data['CatalogProduct']['product_name']; ?></h1>
        <ul class="breadcrumbs">
            <li><?php echo $this->Html->link(__('Home'),'/'); ?></li>
            <li class="current"><?php echo $data['CatalogProduct']['product_name']; ?></li>
        </ul>
    </div>     
</div>

<div class="row">
    <div class="large-9 large-centered columns">        
        <p>
            <?php echo __('Description :').'<br />'; ?>
            <?php echo $data['CatalogProduct']['product_desc']; ?>
        </p>
        <p>
            <?php echo __('Price :').'<br />'; ?>
            <?php echo $data['CatalogProduct']['product_price']; ?>
        </p>
        <p>
            <?php echo __('Image :').'<br />'; ?>
            <?php echo $this->Html->image('products/'.$data['CatalogProduct']['product_main_image']); ?>
        </p>        
    </div>     
</div>

<?php echo $this->append('after_content'); ?>
<?php echo $this->element('footer'); ?>
<?php echo $this->end(); ?>