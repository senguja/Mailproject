<?php

use Backend\Database\CustomerRepository;

require __DIR__.'/../vendor/autoload.php';
require __DIR__."/home.php";


$data['vorname'] = 'Johannes';
$data['nachname'] = 'Panzer';
$data['description'] = 'Lorem ipsun';
$data['email'] = '123@tag24.de';
var_dump($data);

$customer = new CustomerRepository($pdo);
$customer->insert($data);
?>

<script>
    let data = {};
    fetch('/../source/database.php',{
        method:'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => {
        return response.json()
    }).then(data => console.log(data))
        .catch(error => console.log(error))
    }
    })

</script>
