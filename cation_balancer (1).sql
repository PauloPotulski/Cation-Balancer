-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2023 às 19:46
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cation_balancer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `razao` varchar(30) NOT NULL,
  `texto` varchar(500) NOT NULL,
  `data_envio` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id`, `razao`, `texto`, `data_envio`, `email`) VALUES
(6, 'outro', 'Então, aqui vai um teste para a verificação do sistema!', '2023-10-20', 'ph136614@gmail.com'),
(7, 'To testando', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-10-20', 'ph136614@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL,
  `nivel` varchar(45) NOT NULL,
  `diretorio` varchar(50) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `nivel`, `diretorio`, `pontos`) VALUES
(1, 'iniciante', '../static/txt/formulas_iniciantes', 100),
(2, 'aprendiz', '../static/txt/formulas_aprendiz', 250),
(3, 'avançado', '../static/txt/formulas_avancado', 500),
(4, 'doutor', '../static/txt/formulas_doutor', 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(1) NOT NULL DEFAULT 'U',
  `nome_usuario` varchar(45) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `telefone_usuario` varchar(30) DEFAULT NULL,
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_token_expire` datetime DEFAULT NULL,
  `dir_foto` varchar(255) DEFAULT NULL,
  `pontos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `telefone_usuario`, `reset_token`, `reset_token_expire`, `dir_foto`, `pontos`) VALUES
(3, 'A', 'Paulo Henrique', 'ph136614@gmail.com', '123456789', '', 'fd796e7731ecbd99b52b93a88bfb2627b44fa58d1207ea76f722c7b707185ddb', '2023-10-28 14:50:38', '../static/img/img_usuario/images.jpg', 1000),
(6, 'U', 'Lucas Caetano', 'lucascaetanoferreira232930@gmail.com', '123456789', NULL, 'cfe58f2a46fcb73eb50069239fba5b4b40e318f27a88f2c8278258a219952c20', '2023-10-17 14:02:06', '../static/img/img_usuario/manoel.jpg', 100),
(8, 'U', 'aaaaaaaaa', 'gs7893210@gmail.com', '22082003', '123', NULL, NULL, '../static/img/img_usuario/Planet9_3840x2160.jpg', 3100),
(9, 'U', 'Paulo Potulski', 'opalin123321@gmail.com', '123456789', NULL, NULL, NULL, NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `reset_token` (`reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
