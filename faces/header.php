	<div id="menu">
    	<ul>
        	<li><a<?php if($menu=='home'){echo' class="active"';} ?> href="<?= URL_WEB; ?>">Beranda</a></li>
            <li><a<?php if($menu=='doctor'){echo' class="active"';} ?> href="doctor.php">Dokter</a></li>
            <li><a<?php if($menu=='specialist'){echo' class="active"';} ?> href="specialist.php">Spesialis</a></li>
            <li><a<?php if($menu=='medicine'){echo' class="active"';} ?> href="medicine.php">Medikasi</a></li>
            <li><a<?php if($menu=='laboratory'){echo' class="active"';} ?> href="laboratory.php">Laboratorium</a></li>
            <li><a<?php if($menu=='therapy'){echo' class="active"';} ?> href="therapy.php">Terapi</a></li>
            <li><a<?php if($menu=='symptom'){echo' class="active"';} ?> href="symptom.php">Penyakit</a></li>
            <li><a<?php if($menu=='room'){echo' class="active"';} ?> href="room.php">Kamar</a></li>
            <li><a<?php if($menu=='room_category'){echo' class="active"';} ?> href="room-category.php">Kategori Kamar</a></li>
            <li><a<?php if($menu=='patient'){echo' class="active"';} ?> href="patient.php">Pasien</a></li>
            <li><a<?php if($menu=='outpatient'){echo' class="active"';} ?> href="outpatient.php">Rawat Jalan</a></li>
            <li><a<?php if($menu=='inpatient'){echo' class="active"';} ?> href="inpatient.php">Rawat Inap</a></li>
            <li><a<?php if($menu=='About U'){echo' class="active"';} ?> href="About Us.php">About Us</a></li>
            <li><a href="logout.php">Keluar</a></li>
        </ul>
    </div>
	<div id="header">
    	<img src="assets/img/logo1.png" title="<?= TITLE_WEB; ?>" />
    </div>