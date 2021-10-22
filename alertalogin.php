<?php
?>
<div class="d-flex justify-content-center" role="alert">
    <?php
        if(isset($error_usuario)){
    ?>                                 
            <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                <?php echo $error_usuario; ?>
            </div>
        <?php
            };
        ?>

    <?php
        if(isset($error_ingreso)){
    ?> 
            <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                <?php echo $error_ingreso; ?>
            </div>       
        <?php 
            };
        ?>
                    
    <?php
        if(isset($status_inactive)){
    ?>
            <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                <?php echo $status_inactive; ?>
            </div>
        <?php 
            };
        ?>
</div>
<?php
?>