<?php 

/**
 * Function that colourfully details an array!
 * @param mixed $array 
 * @param string $name 
 * @return void 
 */
function scan($array, $name = 'var') {
    highlight_string("<?php\n\$$name =\n" . var_export($array, true) . ";\n?>");
}


/** @return PDO  */
function getConn() {
    $config = require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

// A function to get all fruits
function getFruits($limit = null) {
    $pdo = getConn();

    $query = 'SELECT * FROM fruits';
    if ($limit) {
        $query = $query .' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    if ($limit) {
        $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    }
    $stmt->execute();
    $fruits = $stmt->fetchAll();

    return $fruits;
}

// A function to show a fruit
function getFruit($id) {
    $pdo = getConn();
    $query = "SELECT * FROM fruits WHERE id = :idVal";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idVal', $id);
    $stmt->execute();
    return $stmt->fetch();
}

function saveFruits($fruitsToSave) {
    $pdo = getConn();

    $new = end($fruitsToSave);

    // scan($new);die;

    $name = $new['name'];
    $type = $new['type'];
    $bio = $new['bio'];
    $image = $new['image'];

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO fruits (name, type, bio, image) VALUES (:name, :type, :bio, :image)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':name' => $name,
        ':type' => $type,
        ':bio' => $bio,
        ':image' => $image
    ]);
    
}