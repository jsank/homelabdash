<?php
// 21 = ftp
// 22 = ssh
// 23 = telnet
// 25 = smtp
// 53 = dns
// 80 = http
// 110 = pop
// 143 = imap
// 443 = https
// 3389 = rdp


$DATASET = Array(
  'Router' => Array(
    'device_name' => 'NIC-GW01',
    'device_desc' => 'Router',
    'device_ip' => '10.0.0.1',
    'device_service' => Array(
      'Telnet' => '23'
    )
  ),
  
  'Plex Server' => Array(
    'device_name' => 'NIC-PLEX01',
    'device_desc' => 'Plex Server',
    'device_ip' => '10.0.0.21',
    'device_service' => Array(
      'Plex' => '32400'
    )
  ),
  
  'Web Server' => Array(
    'device_name' => 'NIC-WEB01',
    'device_desc' => 'Web Server',
    'device_ip' => '10.0.0.35',
    'device_service' => Array(
      'HTTP' => '80',
      'HTTPS' => '443'
    )
  ),

  'WiFi' => Array(
    'device_name' => 'NIC-WAP01',
    'device_desc' => 'WiFi',
    'device_ip' => '10.0.0.2',
    'device_service' => Array(
      'HTTP' => '80',
      'HTTPS' => '443'
    )
  ),

  'Switch' => Array(
    'device_name' => 'NIC-SW01',
    'device_desc' => 'Switch',
    'device_ip' => '10.0.0.3',
    'device_service' => Array(
      'Telnet' => '23',
    )
  ),

  'File Server' => Array(
    'device_name' => 'NIC-FILE01',
    'device_desc' => 'File Server',
    'device_ip' => '10.0.0.18',
    'device_service' => Array(
      'HTTP' => '80',
      'RDP' => '3389'
    )
  ),
);


?>