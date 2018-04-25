<?php
echo 'opcache_get_status:<br>';
var_dump(opcache_get_status());

echo '<br><br>opcache_get_configuration:<br><pre>';
var_dump(opcache_get_configuration());
echo '</pre>';