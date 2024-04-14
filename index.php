<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Cartelera de tipo</title>
    <script src="https://kit.fontawesome.com/06d9f9b20f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>

<?php
if(file_exists('./xml/encartelera.xml')){
    $menu= simplexml_load_file('./xml/encartelera.xml');
}
else {
    exit('Error abriendo encartelera.xml');
}
?>


<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Tipo de platos
  </a>

  <ul class="dropdown-menu">
    <?php
    $aux=[];
        foreach($menu->plato as $fila){
            if(!in_array((string)$fila['tipo'],$aux)){

                echo "<li class='dropdown-item'>";
                echo '<a class="dropdown-item" href="index.php?tipo='.$fila['tipo'].'">'.$fila['tipo'].'</a>';
                echo "</li>";
                array_push($aux,(string)$fila['tipo']);
            }
        }
?>
  </ul>
  <p class="simbolos"><strong> CARNE = 🥩 </strong></p>
  <p class="simbolos"><strong> LACTEO = 🥛 </strong></p>
  <p class="simbolos"><strong> SIN GLUTEN = 🍞 </strong></p>
  <p class="simbolos"><strong> VERDURAS = 🥗</strong></p>
  <p class="simbolos"><strong> VEGETARIANO = 🌱 </strong></p>
</div>

<!-- AASASASAS -->

<div class="container mt-4 mb-4">
    <h2 class="text-center">THE FOOD CAVE</h2>
</div>

<div class="container">
    <?php
    if(isset($_GET['tipo'])){
        foreach ($menu->plato as $fila) {
            if($_GET['tipo'] == $fila['tipo']){
                echo '<div class="plato">';
                echo '<h3>' . $fila->nombre . '</h3>';
                // Añadir la imagen
                echo '<img src="' . $fila->imagen . '" alt="' . $fila->nombre . '">';
                echo '<p class="description">' . $fila->description . '</p>';
                echo '<p><strong>Calorías:</strong> ' . $fila->calorias . '</p>';
                echo '<p><strong>Ingredientes:</strong> ';
                foreach ($fila->ingredientes->categoria as $ingrediente) {
                    echo $ingrediente . ' ';
                }
                echo '</p>';
                echo '</div>';
            }
        }
    } else {
        foreach ($menu->plato as $fila) {
            echo '<div class="plato">';
            echo '<h3>' . $fila->nombre . '</h3>';
            // Añadir la imagen
            echo '<img src="' . $fila->imagen . '" alt="' . $fila->nombre . '">';
            echo '<p class="description">' . $fila->description . '</p>';
            echo '<p><strong>Calorías:</strong> ' . $fila->calorias . '</p>';
            echo '<p><strong>Ingredientes:</strong> ';
            foreach ($fila->ingredientes->categoria as $ingrediente) {
                echo $ingrediente . ' ';
            }
            echo '</p>';
            echo '</div>';
        }
    }
    ?>
</div>



  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>