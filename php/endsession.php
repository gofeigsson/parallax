<?php
session_start();
session_unset();
session_destroy();
?>
<?php
header( 'Location: kidsdatab.php' ) ;
?> 