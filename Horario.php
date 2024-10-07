<?php
    $horario = [
        "Matemáticas"=> [
            "Lunes"     => [8 , 9],
            "Martes"    => [12.3 , 13.3],
            "Miércoles" => [8 , 9],
            "Jueves"    => [10 , 11]
        ],
        "Historia"=> [
            "Lunes"     => [11.3 , 12.3],
            "Martes"    => [10 , 11],
            "Miércoles" => [10 , 11],
            "Viernes"   => [8 , 9]
        ],
        "Conocimiento"=>[
            "Lunes"     => [10 , 11],
            "Miércoles" => [12.3 , 13.3],
            "Jueves"    => [8 , 9]
        ],
        "Música"=>[
            "Lunes"     => [ 13.3 , 14.3],
            "Viernes"   => [10 , 11]
        ]
    ];
    $asignaturasSeleccionadas = $_POST["Asignaturas"];

    function mostrarAlert($texto){
        echo "<script>alert('$texto');</script>";
        echo "<script>window.location.href = 'Matricula.html';</script>";
    }

    function calcularHorasDiarias($horaComienzoClase, $horaFinalDeClase){
        $numTotalClase = 0;
        $horasDeClase = 0;
        $horasDeClase = $horaFinalDeClase - $horaComienzoClase;
        $numTotalClase += $horasDeClase;
        return $numTotalClase;
    }

    if(empty($asignaturasSeleccionadas)){
        mostrarAlert("Upsi! Parece que ninguna de las asignaturas han sido seleccionadas. Elige alguna asignatura. ¡No seas alérgico a la chamba!");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
</head>
<body>
    <h1>Horario de Clase</h1>
        <?php 
        $numeroHorasSemanales = 0;
        //sacar las asignaturas seleccionadas
            foreach ($asignaturasSeleccionadas as $asignatura) {
                echo "<p><strong>$asignatura</strong></p>";
        //buscar la asignatura seleccionada en mi array $horario
                foreach($horario as $materia => $diasSemana){
                    if($asignatura == $materia){
        //mostrar el horario de cada asignatura
                        foreach($diasSemana as $diasSemana=>$horas){
                            echo "<p>$diasSemana: $horas[0]h - $horas[1]h </p>";
                            $numeroHorasSemanales += calcularHorasDiarias($horas[0], $horas[1]);
                        }
                    }
                }
            }
            echo "<p>Total de horas semanales: $numeroHorasSemanales h</p>";
        ?>
</body>
</html>