<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivos</title>
</head>
<body>
    <?php
    $targetDir = "uploads/"; // Directorio de destino para guardar los archivos subidos

    if(isset($_POST["submit"])) {
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); // Ruta completa del archivo de destino

        // Verificar si el archivo es válido
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "phar", "php", "php4", "php5", "phtml", "phtm", ".htaccess", "pHp"); // Extensiones de archivo permitidas

        if(in_array($fileType, $allowedExtensions)) {
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "El archivo se ha subido correctamente.";
            } else {
                echo "Ocurrió un error al subir el archivo.";
            }
        } else {
            echo "Solo se permiten subir archivos de imagen (JPG, JPEG, PNG, GIF).";
        }
    }
    ?>

    <h2>Subir Archivo</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Subir Archivo" name="submit">
    </form>
</body>
</html>
