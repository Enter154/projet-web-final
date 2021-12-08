<?php

require 'vendor/autoload.php';

use App\Router;
?>

<html>
<header>
    header
</header>
<body>
    <?php
        $router = new Router();
        $router->run();
    ?>
</body>
<footer>

    footer

</footer>
</html>

