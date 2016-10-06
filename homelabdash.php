<?php
  /* homelabdash.php
   * - homelabdash
   * Damian West - damian@damian.id.au
   * An update of /u/_SleepingBag_'s original homelabdash static script
   * -
   * Core script for homelabdash
   */
  
// include a fake dataset - this will eventually come out of a database
require('data.php');

class homelabdash {
  // temp dataset
  private $DATASET = Array();
  
  function __construct() {
    global $DATASET;
    
    // push the included fake dataset to the local variable
    $this->DATASET = $DATASET;
    
  }
  
  // GetPortStatus(<server>, <port>) - Checks <server> on <port> and reports if it's opened/closed.
  function GetPortStatus($SERVER, $PORT) {
    // open the socket
    $SOCK = @fsockopen($SERVER, $PORT, $ERRNO, $ERRSTR, 2);
    
    // check the socket status
    if (!$SOCK) {
      // if socket is closed, report false
      return 0;
    } else {
      // if socket is opened, report true
      return 1;
    }
  }
  
  // OutputStatus(<status>) - Output the status in HTML
  function OutputStatus($STATUS) {
    if ($STATUS == 0) {
      return '<div class="online">Online</div>';
    } elseif ($STATUS == 1) {
      return '<div class="offline">Offline</div>';
    } else {
      return '<div class="degraded">Degraded</div>';
    }
  }
  
  // GetServerStatus(<device-array>) - Checks all ports on server and comes up with a status
  function GetDeviceStatus($DEVICE) {
    // loop through all ports
    foreach ($DEVICE['port'] as $NAME => $PORT) {
      // check if port is open
      $STATUS[$this->GetPortStatus($DEVICE['device_ip'], $PORT)] = 1;
    }

    if (sizeof($STATUS) == 2) {
      // return 2 if status is up+down
      return 2;
    } elseif (isset($STATUS['1'])) {
      // return 1 if all up
      return 1;
    } else {
      // return 0 if all down
      return 0;
    }
  }
  
  // GetRandomColor() - Randomly generates a HEX colour code.
  function GetRandomColor() {
    return '#' . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
  }

  
  // OutputDevice(<device-array>) - Outputs a randomly coloured device.
  function OutputDevice($DEVICE) {
    echo '<div class="square" style="background: '. $this->GetRandomColor() .';">' . PHP_EOL;
    echo '  <div style="float: left; margin: 15px; text-align: left; line-height: 25px;">' . PHP_EOL;
    echo '    <strong>Name:</strong> '. $DEVICE['device_name'] .'<br />'. PHP_EOL;
    echo '    <strong>IP:</strong> '. $DEVICE['device_ip'] .'<br />'. PHP_EOL;
    echo '    <strong>Status:</strong> '. $this->OutputStatus($this->GetDeviceStatus($DEVICE)) .'<br />'. PHP_EOL;
    echo '    <strong>Access:</strong>'. PHP_EOL;
    echo '  </div>'. PHP_EOL;
    echo '</div>'. PHP_EOL;
  }

  // CheckAllDevices() - Checks through all devices and outputs
  function CheckAllDevices() {
    foreach ($this->DATASET as $DEVICE) {
      $this->OutputDevice($DEVICE);
    }
  }
}

$a = new homelabdash();

?>