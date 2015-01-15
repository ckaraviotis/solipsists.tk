<?php

include 'guildUpdate.php';
//$this->guildUpdate();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'refresh':
            refresh();
            break;
    }
}

function refresh() {
	$this->guildUpdate();
	exit;
}
