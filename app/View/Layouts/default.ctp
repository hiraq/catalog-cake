<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>            
            <?php echo $title_for_layout; ?>
        </title>
        
        <!-- css block -->
        <?php echo $this->Html->css(array('normalize','foundation.min')); ?>
        <?php echo $this->fetch('css'); ?>
        
        <!-- on top javascript block -->
        <?php echo $this->Html->script('vendor/custom.modernizr'); ?>
        <?php echo $this->fetch('script_on_top'); ?>
        
    </head>
    <body>
        
        <!-- content management block -->
        <?php echo $this->fetch('before_content'); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->fetch('after_content'); ?>
        
        <!-- on bottom javascript block -->
        <?php echo $this->Html->script('vendor/jquery'); ?>
        <?php echo $this->Html->script('foundation.min'); ?>
        <?php echo $this->fetch('script_on_bottom'); ?>
        
    </body>
</html>
