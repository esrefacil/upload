<?php
$directorio = 'upload';

// Verificar si el directorio ya existe
if (!is_dir($directorio)) {
    // Intentar crear el directorio
    if (mkdir($directorio, 0755)) {
        echo 'Directorio creado exitosamente.';
    } else {
        echo 'Error al crear el directorio.';
    }
} else {
    echo 'El directorio ya existe.';
}
?>
