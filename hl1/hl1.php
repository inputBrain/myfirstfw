<?php

$var = 10;
$copyVar = $var;
$linkVar = &$var;
echo "Var = <b>{$var}</b>], copyVar = <b>{$copyVar}</b>, linkvar = <b>{$linkVar}</b>";

$copyVar = 15;
echo "Var = <b>{$var}</b>], copyVar = <b>{$copyVar}</b>, linkvar = <b>{$linkVar}</b>";

$linkVar = 13;
echo "Var = <b>{$var}</b>], copyVar = <b>{$copyVar}</b>, linkvar = <b>{$linkVar}</b>";