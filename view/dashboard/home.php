<?php

require_once "model/Pegawai.php";

$pegawai = new Pegawai();

$totalPegawai  = $pegawai->totalPegawai();
$totalTetap    = $pegawai->totalStatus("Tetap");
$totalKontrak  = $pegawai->totalStatus("Kontrak");
$totalMagang   = $pegawai->totalStatus("Magang");

$dataTerbaru = $pegawai->terbaru();
$grafik = $pegawai->grafikStatus();

$label = [];
$total = [];

while($g = $grafik->fetch_assoc()){

    $label[] = $g['status'];

    $total[] = $g['total'];

}

?>

<div class="row mb-4">

    <div class="col-md-12">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h3 style="color:#443025;">
                    Selamat Datang,
                    <b><?= $_SESSION['nama']; ?></b> 👋
                </h3>
<div class="alert mt-3" style="background:#F2CFD2;border-left:5px solid #AA7F66;color:#443025;">

    <h5 class="mb-1">
        <i class="bi bi-stars"></i>
        Selamat Datang di SIMPEG
    </h5>

    <small>

        Hari ini :
        <?= date('l, d F Y'); ?>

        |

        <span id="jam"></span>

    </small>

</div>
                <p class="text-muted mb-0">
                    Selamat datang di Sistem Informasi Data Pegawai.
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row mb-4">
    <div class="card shadow mb-4">

    <div class="card-header custom-header">

        <h5 class="mb-0">

            <i class="bi bi-bar-chart-fill"></i>

            Grafik Status Pegawai

        </h5>

    </div>

    <div class="card-body">

        <canvas id="grafikStatus"></canvas>

    </div>

</div>

    <div class="col-md-3">

        <div class="card stat-card shadow">

            <div class="card-body text-center">

                <i class="bi bi-people-fill fs-1 text-secondary"></i>

                <h2><?= $totalPegawai ?></h2>

                <p>Total Pegawai</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card stat-card shadow">

            <div class="card-body text-center">

                <i class="bi bi-person-check-fill fs-1" style="color:#7F5836"></i>

                <h2><?= $totalTetap ?></h2>

                <p>Pegawai Tetap</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card stat-card shadow">

            <div class="card-body text-center">

                <i class="bi bi-person-workspace fs-1" style="color:#AA7F66"></i>

                <h2><?= $totalKontrak ?></h2>

                <p>Pegawai Kontrak</p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card stat-card shadow">

            <div class="card-body text-center">

                <i class="bi bi-mortarboard-fill fs-1" style="color:#EC9C9D"></i>

                <h2><?= $totalMagang ?></h2>

                <p>Pegawai Magang</p>

            </div>

        </div>

    </div>

</div>

<div class="card shadow">

    <div class="card-header custom-header">

        <h5 class="mb-0">

            <i class="bi bi-clock-history"></i>

            Data Pegawai Terbaru

        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-theme">

                    <tr>

                        <th>Foto</th>
                        <th>Nomor Pegawai</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                <?php while($row = $dataTerbaru->fetch_assoc()){ ?>

                    <tr>

                        <td width="80">

                            <img
                            src="uploads/<?= $row['foto']; ?>"
                            width="55"
                            height="55"
                            class="rounded-circle border"
                            style="object-fit:cover;">

                        </td>

                        <td><?= $row['nomor_pegawai']; ?></td>

                        <td><?= $row['nama_pegawai']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td>

                        <?php

                        if($row['status']=="Tetap"){

                            echo "<span class='badge badge-tetap'>Tetap</span>";

                        }elseif($row['status']=="Kontrak"){

                            echo "<span class='badge badge-kontrak'>Kontrak</span>";

                        }else{

                            echo "<span class='badge badge-magang'>Magang</span>";

                        }

                        ?>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
<?php

if($page=="home"){

?>

<script>

const ctx=document.getElementById('grafikStatus');

if(ctx){

new Chart(ctx,{

type:'doughnut',

data:{

labels:[
<?= "'".implode("','",$label)."'" ?>
],

datasets:[{

data:[
<?= implode(",",$total) ?>
],

backgroundColor:[

'#EC9C9D',

'#AA7F66',

'#443025'

],

borderWidth:2

}]

},

options:{

responsive:true,

plugins:{

legend:{

position:'bottom'

}

}

}

});

}

</script>

<?php } ?>
<script>

function tampilJam(){

let sekarang=new Date();

let jam=String(sekarang.getHours()).padStart(2,'0');

let menit=String(sekarang.getMinutes()).padStart(2,'0');

let detik=String(sekarang.getSeconds()).padStart(2,'0');

document.getElementById("jam").innerHTML=
jam+":"+menit+":"+detik;

}

setInterval(tampilJam,1000);

tampilJam();

</script>