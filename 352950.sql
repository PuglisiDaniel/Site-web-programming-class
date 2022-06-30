-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 01-Jul-2022 às 01:50
-- Versão do servidor: 10.3.22-MariaDB-log
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `352950`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Administrador`
--

CREATE TABLE `Administrador` (
  `ID_Adm` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Telefone` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Administrador`
--

INSERT INTO `Administrador` (`ID_Adm`, `Nome`, `Telefone`, `Email`, `Senha`) VALUES
(2, 'Daniel', '5555', 'teste@teste', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Camera`
--

CREATE TABLE `Camera` (
  `ID_Camera` int(11) NOT NULL,
  `Local` varchar(400) NOT NULL,
  `ID_Paciente` int(11) NOT NULL,
  `ID_Cuidador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Camera`
--

INSERT INTO `Camera` (`ID_Camera`, `Local`, `ID_Paciente`, `ID_Cuidador`) VALUES
(4, 'sala', 4, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cuidador`
--

CREATE TABLE `Cuidador` (
  `ID_Cuidador` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Telefone` varchar(200) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Cuidador`
--

INSERT INTO `Cuidador` (`ID_Cuidador`, `Nome`, `Telefone`, `Email`, `Senha`) VALUES
(4, 'CuidadorA', '444', 'cuidador@a', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'CuidadorB', '444', 'cuidador@b', '01cfcd4f6b8770febfb40cb906715822'),
(7, 'CuidadorC', '4444', 'cuidador@c', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Camilo Maia Pires', '11996382932', 'camilomp812@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Paciente`
--

CREATE TABLE `Paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Telefone` varchar(200) NOT NULL,
  `Idade` int(11) NOT NULL,
  `Enfermidade` varchar(400) NOT NULL,
  `QTD_Cameras` int(11) NOT NULL,
  `Endereco` varchar(400) NOT NULL,
  `ID_Cuidador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `Paciente`
--

INSERT INTO `Paciente` (`ID_Paciente`, `Nome`, `Telefone`, `Idade`, `Enfermidade`, `QTD_Cameras`, `Endereco`, `ID_Cuidador`) VALUES
(4, 'PacienteA', '11111', 87, 'cancer', 1, 'Rua A', 4),
(5, 'PacienteB', '55555', 97, '', 0, 'Rua B', 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`ID_Adm`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Índices para tabela `Camera`
--
ALTER TABLE `Camera`
  ADD PRIMARY KEY (`ID_Camera`),
  ADD KEY `ID_Cuidador` (`ID_Cuidador`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Índices para tabela `Cuidador`
--
ALTER TABLE `Cuidador`
  ADD PRIMARY KEY (`ID_Cuidador`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Índices para tabela `Paciente`
--
ALTER TABLE `Paciente`
  ADD PRIMARY KEY (`ID_Paciente`),
  ADD KEY `ID_Cuidador` (`ID_Cuidador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Administrador`
--
ALTER TABLE `Administrador`
  MODIFY `ID_Adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `Camera`
--
ALTER TABLE `Camera`
  MODIFY `ID_Camera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `Cuidador`
--
ALTER TABLE `Cuidador`
  MODIFY `ID_Cuidador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `Paciente`
--
ALTER TABLE `Paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Camera`
--
ALTER TABLE `Camera`
  ADD CONSTRAINT `Camera_ibfk_1` FOREIGN KEY (`ID_Cuidador`) REFERENCES `Cuidador` (`ID_Cuidador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Camera_ibfk_2` FOREIGN KEY (`ID_Paciente`) REFERENCES `Paciente` (`ID_Paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Paciente`
--
ALTER TABLE `Paciente`
  ADD CONSTRAINT `Paciente_ibfk_1` FOREIGN KEY (`ID_Cuidador`) REFERENCES `Cuidador` (`ID_Cuidador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
