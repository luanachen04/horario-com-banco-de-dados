<?php 
include("conexao.php");
$consulta = "SELECT * FROM horarios_onibus";
$con = $mysqli->query($consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Horarios</title>
</head>
<body>
    <div class="container">
        <button onclick="window.location.href='linhas.html'">Selecionar outras linhas</button>
        <h1>Marília - Garça</h1>
    </div>

    <div class="filter">
        <label for="local_partida">Local de Partida:</label>
        <select id="local_partida">
            <option value="">Todos</option>
            <?php 
            $partidaConsulta = "SELECT DISTINCT local_partida FROM horarios_onibus";
            $partidaResult = $mysqli->query($partidaConsulta);
            while($partida = $partidaResult->fetch_assoc()) {
                echo '<option value="' . $partida['local_partida'] . '">' . $partida['local_partida'] . '</option>';
            }
            ?>
        </select>

        <label for="dia_semana">Dia da Semana:</label>
        <select id="dia_semana">
            <option value="">Todos</option>
            <?php 
            $diaConsulta = "SELECT DISTINCT dia_semana FROM horarios_onibus";
            $diaResult = $mysqli->query($diaConsulta);
            while($dia = $diaResult->fetch_assoc()) {
                echo '<option value="' . $dia['dia_semana'] . '">' . $dia['dia_semana'] . '</option>';
            }
            ?>
        </select>
    </div>

    <table id="horariosTable">
        <thead>
            <tr>
                <th>Horário</th>
                <th>Dia da semana</th>
                <th>Ponto de Partida</th>
            </tr>
        </thead>
        <tbody>
            <?php while($dado = $con->fetch_array()){ ?>
            <tr>
                <td><?php echo $dado["hora"]; ?></td>
                <td><?php echo $dado["dia_semana"]; ?></td>
                <td><?php echo $dado["local_partida"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>