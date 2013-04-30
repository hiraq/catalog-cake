<div class="row">
    <div class="large-9 large-centered columns">
        <h1 class="subheader"><?php echo __('Contact Us'); ?></h1>
        <ul class="breadcrumbs">
            <li><?php echo $this->Html->link(__('Home'),'/'); ?></li>
            <li class="current"><?php echo __('Contact Us'); ?></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="large-9 large-centered columns">
        <?php if (isset($data) && !empty($data)) : ?>
        <p>
            <?php echo $data['CatalogContact']['contact_content']; ?>
        </p>
        <?php else: ?>
        <p>
            <?php echo __('No contact available'); ?>
        </p>
        <?php endif; ?>
    </div>
</div>