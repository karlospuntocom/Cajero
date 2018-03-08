-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 07:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcial`
--

-- --------------------------------------------------------

--
-- Table structure for table `cajero`
--

CREATE TABLE `cajero` (
  `ID_cajero` int(11) NOT NULL,
  `ID_sucursal` int(11) NOT NULL,
  `Saldo` bigint(20) NOT NULL,
  `Monto_max` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cajero`
--

INSERT INTO `cajero` (`ID_cajero`, `ID_sucursal`, `Saldo`, `Monto_max`) VALUES
(1, 1, 15000000, 50000000),
(2, 2, 15000000, 50000000),
(3, 3, 10000000, 50000000),
(4, 4, 5000000, 50000000),
(5, 5, 13000000, 50000000),
(6, 6, 8500000, 50000000),
(7, 7, 900000, 50000000),
(8, 8, 20000000, 50000000),
(9, 9, 45000000, 50000000),
(10, 10, 50000000, 50000000),
(11, 11, 35000000, 50000000),
(12, 12, 22000000, 50000000),
(13, 13, 11500000, 50000000),
(14, 14, 143000000, 50000000),
(15, 15, 7000000, 50000000),
(16, 16, 2000000, 50000000);

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `ID_ciudad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`ID_ciudad`, `Nombre`) VALUES
(1, 'Bogota'),
(2, 'Medellin'),
(3, 'Cali'),
(4, 'Cartagena');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `ID_cliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Tipo_doc` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `ID_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`ID_cliente`, `Nombre`, `Apellido`, `Tipo_doc`, `Direccion`, `Telefono`, `ID_ciudad`) VALUES
(12345, 'Arcangel', 'Higuera', 'CC', 'Cra 34 n 56 89', 3175426, 4),
(24567, 'Maria', 'Jaimes', 'CC', 'Cll 123 A n 45 98', 78546231, 2),
(51631, 'Julio', 'Jaramillo', 'CC', 'Calle 25 n 10 25', 7356481, 1),
(354879, 'Juan', 'Juarez', 'CE', 'Cra 25 n 48 75', 9562140, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE `cuenta` (
  `ID_cuenta` int(11) NOT NULL,
  `Saldo` bigint(11) NOT NULL,
  `Fecha_apertura` date NOT NULL,
  `ID_cliente` int(11) NOT NULL,
  `ID_sucursalppal` int(11) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuenta`
--

INSERT INTO `cuenta` (`ID_cuenta`, `Saldo`, `Fecha_apertura`, `ID_cliente`, `ID_sucursalppal`, `contrasena`) VALUES
(1, 98150025, '2011-10-23', 12345, 10, '12345'),
(2, 4300000, '1998-01-10', 51631, 2, '54321'),
(3, 78000, '2015-12-18', 24567, 13, '98765'),
(4, 98000000, '2003-12-02', 354879, 7, '56789');

-- --------------------------------------------------------

--
-- Table structure for table `log_cajero`
--

CREATE TABLE `log_cajero` (
  `ID_acceso` int(11) NOT NULL,
  `Fecha_hora` date NOT NULL,
  `ID_transaccion` int(11) NOT NULL,
  `ID_cuenta` int(11) NOT NULL,
  `ID_cajero` int(11) NOT NULL,
  `monto` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_sucursal` int(11) NOT NULL,
  `ID_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sucursal`
--

INSERT INTO `sucursal` (`ID_sucursal`, `ID_ciudad`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 4),
(14, 4),
(15, 4),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaccion`
--

CREATE TABLE `transaccion` (
  `ID_transaccion` int(11) NOT NULL,
  `Descripcion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaccion`
--

INSERT INTO `transaccion` (`ID_transaccion`, `Descripcion`) VALUES
(1, 'Ingreso S'),
(2, 'Consulta D'),
(3, 'Retiro D'),
(4, 'Consigna D'),
(5, 'Salida S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cajero`
--
ALTER TABLE `cajero`
  ADD PRIMARY KEY (`ID_cajero`),
  ADD KEY `ID_sucursal` (`ID_sucursal`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ID_ciudad`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_cliente`);

--
-- Indexes for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`ID_cuenta`),
  ADD KEY `ID_cliente` (`ID_cliente`);

--
-- Indexes for table `log_cajero`
--
ALTER TABLE `log_cajero`
  ADD PRIMARY KEY (`ID_acceso`),
  ADD KEY `ID_cajero` (`ID_cajero`),
  ADD KEY `ID_cuenta` (`ID_cuenta`),
  ADD KEY `ID_transaccion` (`ID_transaccion`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_sucursal`),
  ADD KEY `ID_ciudad` (`ID_ciudad`);

--
-- Indexes for table `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`ID_transaccion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cajero`
--
ALTER TABLE `cajero`
  MODIFY `ID_cajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ID_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51632;

--
-- AUTO_INCREMENT for table `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `ID_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_cajero`
--
ALTER TABLE `log_cajero`
  MODIFY `ID_acceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `ID_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `ID_transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cajero`
--
ALTER TABLE `cajero`
  ADD CONSTRAINT `cajero_ibfk_1` FOREIGN KEY (`ID_sucursal`) REFERENCES `sucursal` (`ID_sucursal`);

--
-- Constraints for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `cliente` (`ID_cliente`);

--
-- Constraints for table `log_cajero`
--
ALTER TABLE `log_cajero`
  ADD CONSTRAINT `log_cajero_ibfk_1` FOREIGN KEY (`ID_cajero`) REFERENCES `cajero` (`ID_cajero`),
  ADD CONSTRAINT `log_cajero_ibfk_2` FOREIGN KEY (`ID_cuenta`) REFERENCES `cuenta` (`ID_cuenta`),
  ADD CONSTRAINT `log_cajero_ibfk_3` FOREIGN KEY (`ID_transaccion`) REFERENCES `transaccion` (`ID_transaccion`);

--
-- Constraints for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`ID_ciudad`) REFERENCES `ciudad` (`ID_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
