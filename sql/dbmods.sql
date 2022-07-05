-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2022 às 00:22
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbmods`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comments`
--

CREATE TABLE `tb_comments` (
  `userId` int(11) NOT NULL,
  `modId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mods`
--

CREATE TABLE `tb_mods` (
  `modId` int(11) NOT NULL,
  `titleMod` varchar(255) NOT NULL,
  `bannerMod` varchar(255) NOT NULL,
  `descMod` text NOT NULL,
  `sizeMod` varchar(255) NOT NULL,
  `youtubeMod` varchar(255) NOT NULL,
  `downloadMod` varchar(255) NOT NULL,
  `typeMod` enum('cleo','grafico','gta','veiculo') NOT NULL,
  `countDownloads` int(11) NOT NULL,
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_mods`
--

INSERT INTO `tb_mods` (`modId`, `titleMod`, `bannerMod`, `descMod`, `sizeMod`, `youtubeMod`, `downloadMod`, `typeMod`, `countDownloads`, `registrationDate`, `userId`) VALUES
(5, 'Pai de nave', '../image/banner/62c4518a25614.jpg', 'Essa live foi incrível', '5kb', 'youtube', 'mediafire', 'gta', 0, '2022-07-05 11:58:18', 1),
(8, 'Moto r6', '../image/banner/62c45c11d3606.jpg', 'esse dia foi mai louco ainda!!', '3gb', 'youtubeee', 'mediafireeee', 'cleo', 0, '2022-07-05 12:43:13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `recovery` varchar(255) NOT NULL,
  `level` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `profile`, `password`, `recovery`, `level`, `registrationDate`) VALUES
(1, 'maior', '../image/profile/62c43f1ee4c90.jpg', 'b95c988b121e7433c4da81c76b90a79b', 'maior', '1', '2022-07-05 10:39:42'),
(2, 'maiorzin', '../image/profile/62c471e2a7ebe.jpg', '14c879f3f5d8ed93a09f6090d77c2cc3', '3434', '1', '2022-07-05 14:16:18');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD KEY `fk_tb_comments_tb_user1` (`userId`),
  ADD KEY `fk_tb_comments_tb_mods1` (`modId`);

--
-- Índices para tabela `tb_mods`
--
ALTER TABLE `tb_mods`
  ADD PRIMARY KEY (`modId`,`userId`),
  ADD KEY `fk_tb_mods_tb_user1` (`userId`);

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_mods`
--
ALTER TABLE `tb_mods`
  MODIFY `modId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `fk_tb_comments_tb_mods1` FOREIGN KEY (`modId`) REFERENCES `tb_mods` (`modId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_comments_tb_user1` FOREIGN KEY (`userId`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_mods`
--
ALTER TABLE `tb_mods`
  ADD CONSTRAINT `fk_tb_mods_tb_user1` FOREIGN KEY (`userId`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
