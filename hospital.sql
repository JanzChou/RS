-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 11:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `address` longtext,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `username` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `gender_id`, `address`, `phone`, `email`, `username`, `password`, `status`) VALUES
(1, 'Admin', 1, NULL, NULL, 'admin@hospital.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `specialist_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `birth_place` varchar(120) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` longtext,
  `phone` varchar(45) DEFAULT NULL,
  `Jadwal` varchar(120) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `specialist_id`, `name`, `gender_id`, `birth_place`, `birth_date`, `address`, `phone`, `Jadwal`, `price`, `status`) VALUES
(1, 0, 'Abdul', 1, 'Jakarta', '1992-11-01', 'Jakarta', '021 - 765 4321', '', 0, 0),
(2, 1, 'Dr. Hana', 1, 'Jakarta', '1980-11-05', 'Jakarta', '021 - 765 4321', 'Rabu , Jumat', 200000, 1),
(3, 3, 'Dr. Doni', 1, 'Jakarta', '1970-08-18', 'Jakarta', '021 - 765 4321', 'Senin , Sabtu', 300000, 1),
(4, 1, 'cho daniel', 1, 'seoul', '2018-06-12', 'apt. gangnam ', '0102346788', 'selasa rabu', 50000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` longtext,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `name`, `description`, `price`) VALUES
(1, 'KIMIA-01', 'Mereka menguji komponen/analit yang berbeda-beda dalam serum atau plasma.', 190000),
(2, 'HEMATOLOGI-01', 'Mereka melakukan penghitungan darah dan evaluasi morfologi darah.', 200000),
(3, 'IMUNOLOGI-SEROLOGI-01', 'Menguji banyak hal dengan menggunakan prinsip reaksi antigen-antibodi.', 230000),
(4, 'MIKROBIOLOGI-01', 'Menerima usapan, tinja, air seni, darah, dahak, peralatan medis, begitupun jaringan yang mungkin ter', 300000),
(5, 'PARASITOLOGI-01', 'Mengamati parasit.', 250000),
(6, 'KOAGULASI-01', 'Menganalisis waktu bekuan dan faktor koagulasi.', 170000);

-- --------------------------------------------------------

--
-- Table structure for table `medical_procedure`
--

CREATE TABLE `medical_procedure` (
  `id` int(11) NOT NULL,
  `medical_procedure_category_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` longtext,
  `remarks` longtext,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_procedure`
--

INSERT INTO `medical_procedure` (`id`, `medical_procedure_category_id`, `name`, `description`, `remarks`, `price`) VALUES
(1, 2, 'AFP Blood Test (Alpha-fetoprotein Blood Test)', NULL, NULL, 300000),
(2, 2, 'Adenosine (Exercise Stress Test)', NULL, NULL, 230000),
(3, 2, 'Adenosine Stress Test For Heart Disease', NULL, NULL, 200000),
(4, 2, 'Antinuclear Antibody', NULL, NULL, 100000),
(5, 2, 'Artificial Kidney (Hemodialysis)', NULL, NULL, 230000);

-- --------------------------------------------------------

--
-- Table structure for table `medical_procedure_category`
--

CREATE TABLE `medical_procedure_category` (
  `id` int(11) NOT NULL,
  `category` varchar(120) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_procedure_category`
--

INSERT INTO `medical_procedure_category` (`id`, `category`, `status`) VALUES
(1, 'Dermatologic', NULL),
(2, 'Neurology', NULL),
(3, 'Genital', NULL),
(4, 'Urology', NULL),
(5, 'Vascular', NULL),
(6, 'Prostatic', NULL),
(7, 'Emergency', NULL),
(8, 'Breast', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_service`
--

CREATE TABLE `medical_service` (
  `id` int(11) NOT NULL,
  `medical_service_name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_service_group`
--

CREATE TABLE `medical_service_group` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_service_group`
--

INSERT INTO `medical_service_group` (`id`, `name`) VALUES
(1, 'Outpatient'),
(2, 'Inpatient');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(20) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `indication` varchar(120) DEFAULT NULL,
  `dossage` varchar(120) DEFAULT NULL,
  `variant` varchar(120) DEFAULT NULL,
  `packaging` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `expire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `code`, `name`, `indication`, `dossage`, `variant`, `packaging`, `stock`, `price`, `expire`) VALUES
(1, 'MD0001', 'Bodrex', NULL, NULL, NULL, NULL, NULL, 5000, NULL),
(2, 'MD0002', 'Ponstand', NULL, NULL, NULL, NULL, NULL, 3000, NULL),
(3, 'MD0003', 'Hulfagrin', NULL, NULL, NULL, NULL, NULL, 12000, NULL),
(4, 'MD0004', 'Tempra Syrup', NULL, NULL, NULL, NULL, NULL, 8000, NULL),
(5, 'MD0005', 'Entrostop', NULL, NULL, NULL, NULL, NULL, 7000, NULL),
(6, 'MD0006', 'Ester-C', NULL, NULL, NULL, NULL, NULL, 52000, '2047-00-00'),
(7, 'MD0007', 'Alkohol', '-', '2x1', '-', 'Bottle', 11, 17000, '2014-12-24'),
(8, 'MD0008', 'Revanol', NULL, NULL, NULL, NULL, NULL, 13000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `birth_place` varchar(120) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` longtext,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `gender_id`, `birth_place`, `birth_date`, `address`, `phone`, `email`, `register_date`, `create_date`) VALUES
(1, 'Abdul', 1, 'Jakarta', '1990-11-02', 'Jakarta', '021 - 765 4321', 'abdul@gmail.com', NULL, NULL),
(2, 'Rina', 2, 'Tangerang', '1985-11-23', 'Jakarta', '021 - 765 4321', 'rina@gmail.com', '2014-11-27 03:55:20', '2014-11-27 03:55:20'),
(3, 'Fendy', 1, 'Bogor', '2017-10-05', 'jln bogor raya no.99', '0000000000', '-', '2018-06-03 16:04:26', '2018-06-03 16:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(15) NOT NULL,
  `room_category_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` longtext,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_category_id`, `name`, `description`, `price`) VALUES
(1, 1, 'Kamar Mawar', NULL, 200000),
(2, 2, 'Kamar Anggrek', NULL, 300000),
(3, 1, 'Kamar Melati', '', 230000);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `name`, `description`) VALUES
(1, 'Regular', ''),
(2, 'VIP', NULL),
(3, 'VVIP', '');

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `id` int(20) NOT NULL,
  `title` varchar(35) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`id`, `title`, `name`, `description`) VALUES
(1, 'Sp.A', 'Spesialis Anak', 'Untuk pengecekan dan mengobati gejala penyakit pada anak'),
(2, 'Sp.B', 'Spesialis Bedah', 'Untuk membedah bagian organ tubuh'),
(3, 'Sp.BS', 'Spesialis Bedah Saraf', 'Untuk membedah bagian-bagian saraf'),
(4, 'Sp.MK', 'Spesialis Mikrobiologi Klinik', 'Untuk pencegahan dan mengobati akibat terkena infeksi'),
(5, 'SP.M', 'Spesialis Mata', 'Pemeriksaan untuk bagian dalam dan luar mata');

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--

CREATE TABLE `symptom` (
  `id` int(20) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`id`, `name`, `description`) VALUES
(1, 'Influenza', NULL),
(2, 'Migrain', NULL),
(3, 'Batuk', ''),
(4, 'Tifus', NULL),
(5, 'Demam Berdarah', NULL),
(6, 'Mual', NULL),
(7, 'Maag', '');

-- --------------------------------------------------------

--
-- Table structure for table `therapy`
--

CREATE TABLE `therapy` (
  `id` int(20) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` longtext,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `therapy`
--

INSERT INTO `therapy` (`id`, `name`, `description`, `price`) VALUES
(1, 'IABP', NULL, 100000),
(2, 'Plasma Exchange', NULL, 200000),
(3, 'Incubator', NULL, 250000),
(4, 'Ventilator', NULL, 230000),
(5, 'Set Hypopyse / Micro', NULL, 320000),
(6, 'Blangket Warmer', '-', 130000),
(7, 'Syringe Pump', NULL, 140000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `medical_service_group_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `date`, `medical_service_group_id`, `patient_id`, `price`, `status`) VALUES
(1, '2014-11-27 04:53:25', 1, 1, 914000, 0),
(2, '2014-11-27 19:42:33', 2, 2, 1530000, 0),
(3, '2018-06-03 15:10:41', 1, 2, 50000, 0),
(4, '2018-06-03 15:21:03', 1, 2, 67000, 0),
(5, '2018-06-03 15:22:33', 2, 1, 0, 0),
(6, '2018-06-03 15:33:22', 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_diagnose`
--

CREATE TABLE `transaction_diagnose` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `symptom_id` int(11) NOT NULL,
  `description` longtext,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_diagnose`
--

INSERT INTO `transaction_diagnose` (`id`, `transaction_id`, `date`, `symptom_id`, `description`, `status`) VALUES
(2, 1, '2014-11-10 00:00:00', 5, 'Gejala...', 0),
(3, 1, '0000-00-00 00:00:00', 0, '', 0),
(4, 1, '2014-11-06 00:00:00', 1, 'Gejala awal..', 0),
(5, 2, '2014-11-12 00:00:00', 3, '', 0),
(6, 2, '2014-11-07 00:00:00', 5, 'Gejala DBD', 0),
(7, 4, '2018-06-02 00:00:00', 1, 'gejala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_doctor`
--

CREATE TABLE `transaction_doctor` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `description` longtext,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_doctor`
--

INSERT INTO `transaction_doctor` (`id`, `transaction_id`, `date`, `doctor_id`, `description`, `price`, `status`) VALUES
(1, 1, '2014-11-27 04:53:25', 2, NULL, 200000, NULL),
(4, 2, '2014-11-08 00:00:00', 2, 'Periksa rutin', 200000, 0),
(5, 2, '2014-11-06 00:00:00', 3, 'Bedah...', 300000, 0),
(6, 3, '2018-06-03 15:10:41', 4, NULL, 50000, NULL),
(7, 4, '2018-06-03 15:21:03', 4, NULL, 50000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_laboratory`
--

CREATE TABLE `transaction_laboratory` (
  `id` int(20) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `laboratory_id` int(11) NOT NULL,
  `description` longtext,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_laboratory`
--

INSERT INTO `transaction_laboratory` (`id`, `transaction_id`, `date`, `laboratory_id`, `description`, `price`, `status`) VALUES
(4, 1, '0000-00-00 00:00:00', 3, 'Tes imun', 230000, 0),
(5, 2, '2014-11-15 00:00:00', 3, '', 230000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_medicine`
--

CREATE TABLE `transaction_medicine` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_medicine`
--

INSERT INTO `transaction_medicine` (`id`, `transaction_id`, `date`, `medicine_id`, `qty`, `price`, `status`) VALUES
(1, 1, '2014-11-13 00:00:00', 2, 2, 3000, 0),
(2, 1, '2014-11-13 00:00:00', 1, 3, 5000, 0),
(3, 1, '2014-11-02 00:00:00', 4, 2, 16000, 0),
(4, 4, '2018-06-02 00:00:00', 7, 1, 17000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_room`
--

CREATE TABLE `transaction_room` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `description` longtext,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_room`
--

INSERT INTO `transaction_room` (`id`, `transaction_id`, `date`, `room_id`, `description`, `price`, `status`) VALUES
(2, 2, '2014-11-06 00:00:00', 2, '', 300000, 0),
(3, 2, '2014-11-21 00:00:00', 1, '', 200000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_symptom`
--

CREATE TABLE `transaction_symptom` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `symptom_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_therapy`
--

CREATE TABLE `transaction_therapy` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `therapy_id` int(11) NOT NULL,
  `description` longtext,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_therapy`
--

INSERT INTO `transaction_therapy` (`id`, `transaction_id`, `date`, `therapy_id`, `description`, `price`, `status`) VALUES
(1, 1, '2014-11-09 00:00:00', 6, '', 130000, 0),
(2, 2, '2014-11-20 00:00:00', 2, '', 200000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_treatment`
--

CREATE TABLE `transaction_treatment` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `medical_procedure_id` int(11) NOT NULL,
  `description` longtext,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_treatment`
--

INSERT INTO `transaction_treatment` (`id`, `transaction_id`, `date`, `medical_procedure_id`, `description`, `price`, `status`) VALUES
(3, 1, '2014-11-16 00:00:00', 2, '', 230000, 0),
(4, 1, '2014-11-14 00:00:00', 4, '', 100000, 0),
(5, 2, '2014-11-08 00:00:00', 4, '', 100000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender_pk_idx` (`gender_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_procedure`
--
ALTER TABLE `medical_procedure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_procedure_category_pk_idx` (`medical_procedure_category_id`);

--
-- Indexes for table `medical_procedure_category`
--
ALTER TABLE `medical_procedure_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_service`
--
ALTER TABLE `medical_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_service_group`
--
ALTER TABLE `medical_service_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapy`
--
ALTER TABLE `therapy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_diagnose`
--
ALTER TABLE `transaction_diagnose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_doctor`
--
ALTER TABLE `transaction_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_laboratory`
--
ALTER TABLE `transaction_laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_medicine`
--
ALTER TABLE `transaction_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_room`
--
ALTER TABLE `transaction_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_symptom`
--
ALTER TABLE `transaction_symptom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_therapy`
--
ALTER TABLE `transaction_therapy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_treatment`
--
ALTER TABLE `transaction_treatment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_procedure`
--
ALTER TABLE `medical_procedure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_service_group`
--
ALTER TABLE `medical_service_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapy`
--
ALTER TABLE `therapy`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction_diagnose`
--
ALTER TABLE `transaction_diagnose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_doctor`
--
ALTER TABLE `transaction_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_laboratory`
--
ALTER TABLE `transaction_laboratory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_medicine`
--
ALTER TABLE `transaction_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_room`
--
ALTER TABLE `transaction_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_symptom`
--
ALTER TABLE `transaction_symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_therapy`
--
ALTER TABLE `transaction_therapy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_treatment`
--
ALTER TABLE `transaction_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `gender_pk` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_procedure`
--
ALTER TABLE `medical_procedure`
  ADD CONSTRAINT `medical_procedure_category_pk` FOREIGN KEY (`medical_procedure_category_id`) REFERENCES `medical_procedure_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
