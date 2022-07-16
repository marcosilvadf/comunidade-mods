-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2022 às 20:29
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
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `name`, `pass`) VALUES
(2, 'admin', '04eae325f68a669c1ba9dde8ba29aeaa');

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
-- Estrutura da tabela `tb_denunciation`
--

CREATE TABLE `tb_denunciation` (
  `tb_user_id` int(11) NOT NULL,
  `tb_mods_modId` int(11) NOT NULL,
  `tb_mods_userId` int(11) NOT NULL,
  `titleD` varchar(255) NOT NULL,
  `descD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_denunciation`
--

INSERT INTO `tb_denunciation` (`tb_user_id`, `tb_mods_modId`, `tb_mods_userId`, `titleD`, `descD`) VALUES
(1, 10, 1, 'testef ', 'fdadfe efef ewff'),
(2, 10, 1, 'teste', 'drfefefeihsi feihfuedeef efheudhfd\r\n');

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
(5, 'motinhaa', '../image/banner/62c6154087225.jpg', 'essa moto é incrível, mas eu perdi ela', '444kb', 'só n o yt', 'nem teim', 'gta', 331, '2022-07-05 11:58:18', 1),
(8, 'E agora?', '../image/banner/62c84c4896e64.jpg', 'esse dia foi mai louco ainda!!', '3kb', 'youtubeee', 'mediafireeee', 'cleo', 0, '2022-07-05 12:43:13', 1),
(10, 'BANIDO', '../image/banner/62c615fc17a89.jpg', 'eitaaaaaa, nunca mais jogo nesse server ._.', '1kb', 'https://linkebr.com/member/dashboard', 'https://stackoverflow.com/questions/33080226/how-to-open-a-url-using-php', 'gta', 500, '2022-07-06 18:15:28', 1),
(11, 'F rapaziada', '../image/banner/62c616c3f1e05.png', 'isso foi covardia', '350gb', 'nem precisa', 'tambem não precisa', 'grafico', 0, '2022-07-06 20:12:03', 2),
(12, 'RP online, mas todo rp é online ._.', '../image/banner/62c8478be0fa0.jpg', 'Eu sei, tenho alguns títulos meio estranhos, mas não necessários pra ganhar um bom engajamento', '3333gb', 'https://www.youtube.com/', 'https://www.mediafire.com/', 'grafico', 0, '2022-07-08 12:04:43', 1),
(13, 'Essa live foi incrível kkkjk', '../image/banner/62c847d289cf5.png', 'arranjei um trampo, perdi ele, fiquei milionário, perdi tudo e agora eu volto com tudo.', '20gb', 'https://www.youtube.com/', 'https://www.mediafire.com/', 'gta', 0, '2022-07-08 12:05:54', 1);

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
(1, 'maior', '../image/profile/62cad2f095e72.jpg', 'b95c988b121e7433c4da81c76b90a79b', 'maior', '4', '2022-07-05 10:39:42'),
(2, 'marcos', '../image/profile/62caceab1fa8e.jpg', '14c879f3f5d8ed93a09f6090d77c2cc3', '3434', '5', '2022-07-05 14:16:18'),
(8, 'teste', '../image/profile/62cc853a61cc0.jpg', '698dc19d489c4e4db73e28a713eab07b', 'teste', '1', '2022-07-11 17:16:58');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD KEY `fk_tb_comments_tb_user1` (`userId`),
  ADD KEY `fk_tb_comments_tb_mods1` (`modId`);

--
-- Índices para tabela `tb_denunciation`
--
ALTER TABLE `tb_denunciation`
  ADD PRIMARY KEY (`tb_user_id`,`tb_mods_modId`,`tb_mods_userId`),
  ADD KEY `fk_tb_user_has_tb_mods_tb_mods1` (`tb_mods_modId`,`tb_mods_userId`);

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
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_mods`
--
ALTER TABLE `tb_mods`
  MODIFY `modId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Limitadores para a tabela `tb_denunciation`
--
ALTER TABLE `tb_denunciation`
  ADD CONSTRAINT `fk_tb_user_has_tb_mods_tb_mods1` FOREIGN KEY (`tb_mods_modId`,`tb_mods_userId`) REFERENCES `tb_mods` (`modId`, `userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_user_has_tb_mods_tb_user1` FOREIGN KEY (`tb_user_id`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_mods`
--
ALTER TABLE `tb_mods`
  ADD CONSTRAINT `fk_tb_mods_tb_user1` FOREIGN KEY (`userId`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
