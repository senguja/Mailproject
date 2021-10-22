<?php
echo 'test';
require __DIR__."/home.php";

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
var_dump($method);
var_dump($path);
?>

<script>
    let data = {};
    fetch('/index.php',{
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
    //Connection to Database >>data<<
    $pdo = new PDO("mysql:dbname=mail_project;host=localhost",
        "root",
        "root");
</script>
<?php
function insert($data){
    try {
    $vorname=

    $sql= 'INSERT INTO kunde (vorname,nachname,description,email) VALUES (:vorname,:nachname,:description,:email)';
    $statement = $this->pdo->prepare($sql);
    $statement->execute([
        'nachname' => $nachname,
        'vorname' => $vorname,
        'description' => $date
    ]);
} catch (PDOException $e) {
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    exit();
}

}
?>

