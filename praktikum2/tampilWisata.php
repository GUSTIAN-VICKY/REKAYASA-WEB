<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "<p style='color:red;'>Curl Error: " . curl_error($ch) . "</p>";
    }

    curl_close($ch);
    return $output;
}

// Ganti localhost dengan 127.0.0.1 untuk stabilitas
$send = curl("http://localhost/praktikum/praktikum2/getWisata.php");
$data = json_decode($send, true);

// Cek jika JSON tidak valid
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "<p style='color:red;'>JSON Decode Error: " . json_last_error_msg() . "</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tempat Wisata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 850px;
            margin: auto;
            background: white;
            padding: 25px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #34495e;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr { display: block; }
            th {
                display: none;
            }
            td {
                padding: 10px;
                border: none;
                position: relative;
                padding-left: 50%;
            }
            td::before {
                position: absolute;
                left: 10px;
                top: 10px;
                font-weight: bold;
                white-space: nowrap;
            }
            td:nth-of-type(1)::before { content: "ID"; }
            td:nth-of-type(2)::before { content: "Kota"; }
            td:nth-of-type(3)::before { content: "Landmark"; }
            td:nth-of-type(4)::before { content: "Tarif"; }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Tempat Wisata</h1>

    <?php if (!empty($data)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kota</th>
                    <th>Landmark</th>
                    <th>Tarif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id_wisata"]) ?></td>
                        <td><?= htmlspecialchars($row["kota"]) ?></td>
                        <td><?= htmlspecialchars($row["landmark"]) ?></td>
                        <td><?= htmlspecialchars($row["tarif"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color:red;">Data tidak tersedia atau JSON kosong.</p>
    <?php endif; ?>
</div>
</body>
</html>
