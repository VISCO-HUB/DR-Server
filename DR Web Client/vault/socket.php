<?php



INCLUDE 'config.php';


$DATA = JSON_DECODE(FILE_GET_CONTENTS('php://input'));
$IP = $DATA->ip;
$CMD = $DATA->cmd;


$TCP = 'tcp://' . $IP;


$SOCKET = FSOCKOPEN($TCP,$PORT,$ERRNO, $ERRSTR, 1);

IF(!$SOCKET){DIE ('DISCONNECTED');}

//$CMD = 'STARTSERVICE:TeamViewer';
//$CMD = 'STOPSERVICE:TeamViewer';
//$CMD = 'CHALLANGE';

FPUTS($SOCKET, $CMD);
ECHO FGETS($SOCKET, 255);
FCLOSE($SOCKET);

?>