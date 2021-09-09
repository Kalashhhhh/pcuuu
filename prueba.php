<?php
require 'application/third_party/SampQuery.class.php';
$samp = new SampQuery('188.165.190.40', '7777');
print_r($samp->getInfo()); ?><br />
