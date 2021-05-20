<?php
$redis = new Redis();
$_SESSION['redis'] = $redis;
$_SESSION['redis']->connect("127.0.0.1",6379);
