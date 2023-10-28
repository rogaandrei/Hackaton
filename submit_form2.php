<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "3zile";

    // Încercați să stabiliți conexiunea cu serverul MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexiune eșuată: " . $conn->connect_error);
    } else {
        // Mesaj de depanare: Conexiune la baza de date reușită
        error_log("Conexiune la baza de date reușită");
    }

    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $varsta = $_POST["varsta"];
    $perioada = $_POST["perioada"];
    $oras = $_POST["oras"];
    $judet = $_POST["judet"];
    $telefon = $_POST["telefon"];
    $email = $_POST["email"];

    $sql = "INSERT INTO pachet3 (Nume, Prenume, Varsta, Perioada, Oras, Judet, Telefon, Email)
            VALUES ('$nume', '$prenume', '$varsta', '$perioada', '$oras', '$judet', '$telefon', '$email')";

    if ($conn->query($sql) === TRUE) {
    echo "Datele au fost salvate cu succes!";
    // Mesaj de depanare: Inserare reușită în baza de date
    error_log("Inserare reușită în baza de date");
} else {
    echo "Eroare la salvarea datelor: " . $conn->error;
    // Mesaj de depanare: Eroare la inserare în baza de date
    error_log("Eroare la inserare în baza de date: " . $conn->error);
}


    $conn->close();
}
?>
