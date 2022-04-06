<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="total-box">
    <div class="box">
        <?php foreach ($total_user as $tu) : ?>
        <p class="fs-3"><?= $tu ['jumlah_user'] ?></p>
        <?php endforeach; ?>
        <p>Pengelola</p>
        <img src="/icon/pengelola.svg" alt="mdo" width="80" height="80">
    </div>
    <div class="box">
        <p class="fs-3"><?= $total_tanaman ?></p>
        <p>Tanaman</p>
        <img src="/icon/tanaman.svg" alt="mdo" width="80" height="80">
    </div>
    <div class="box">
        <p class="fs-3"><?= $total_lokasi ?></p>
        <p>Lokasi</p>
        <img src="/icon/lokasi.svg" alt="mdo" width="80" height="80">
    </div>
    <div class="box">
        <p class="fs-3"><?= $total_perawatan ?></p>
        <p>Perawatan</p>
        <img src="/icon/perawatan.svg" alt="mdo" width="80" height="80">
    </div>
</div>

<div class="laporan">
    <div class="box">
        <div class="title text-center">
            <h6>Pembuatan Laporan</h6>
        </div>
        <hr>
        <table class="table" style="border-color: #ffffff;">
            <?php foreach ($nama_penanggung as $np) : ?>
            <tr>
                <th style="width: 50px;">
                    <img src="/upload/<?= $np ['foto']; ?>" alt="" width="60" height="60" class="rounded-circle ms-1">
                </th>
                <th>
                    <?= $np ['nama']; ?> <br>
                    <span><?= $np ['jumlah_laporan']; ?> Laporan</span>
                </th>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="grafik mb-4">
        <div class="title text-center" style="width: 100%;">
            <h6>Laporan Harian</h6>
            <canvas id="harianChart" height="70px"></canvas>
        </div>
        <hr>
    </div>
    <div class="grafik">
        <div class="title text-center" style="width: 100%">
            <h6>Laporan Bulanan</h6>
            <canvas id="bulananChart" height="70px"></canvas>
        </div>
        <hr>
    </div>
</div>

<?php 
        foreach ($laporan_bulanan as $lb)
        {
            $month[] = $lb['bulan'];
            $jumlah_bulanan[] = $lb['jumlah_laporan'];
        };

        foreach ($laporan_harian as $lh) {
            $day[] = $lh['thedate'];
            $jumlah_harian[] = $lh['jumlah_laporan']; 
        };
    ?>

<script>
// const harianChart = new Chart(harianChart, {
// data = {
//     labels: labels,
//     datasets: [{
//         label: 'Jumlah Laporan',
//         backgroundColor: [
//         'rgba(255, 99, 132, 0.2)',
//         'rgba(255, 159, 64, 0.2)',
//         'rgba(255, 205, 86, 0.2)',
//         'rgba(75, 192, 192, 0.2)',
//         'rgba(54, 162, 235, 0.2)',
//         'rgba(153, 102, 255, 0.2)',
//         'rgba(201, 203, 207, 0.2)'
//         ],
//         borderColor: [
//         'rgb(255, 99, 132)',
//         'rgb(255, 159, 64)',
//         'rgb(255, 205, 86)',
//         'rgb(75, 192, 192)',
//         'rgb(54, 162, 235)',
//         'rgb(153, 102, 255)',
//         'rgb(201, 203, 207)'
//         ],
//         borderWidth: 1
//     }]
// }
// });

// const config = {
//     type: 'bar',
//     data: data,
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     },
// };

// const harianChart = new Chart(
//     document.getElementById('harianChart'),
//     config
// );

// const bulananChart = new Chart(
//     document.getElementById('bulananChart'),
//     config
// );

var ctx = document.getElementById("harianChart").getContext('2d');
var harianChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($day) ?>,
        datasets: [{
            label: 'Jumlah Laporan',
            data: <?= json_encode($jumlah_harian) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx = document.getElementById("bulananChart").getContext('2d');
var bulananChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ],
        datasets: [{
            label: 'Jumlah Laporan',
            data: <?= json_encode($jumlah_bulanan) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<?= $this->endSection(); ?>