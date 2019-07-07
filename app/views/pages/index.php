<?php 
    ob_start();
    include APPROOT . '/views/templates/header.php'; ?>
    
    <h1><?php echo $data['title']; ?></h1>

<?php 
    include APPROOT . '/views/templates/footer.php';
    ob_end_flush(); ?>