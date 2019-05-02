-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Nov-2018 às 16:58
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(7) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `curso` varchar(15) NOT NULL,
  `ano` int(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `usuario_id`, `curso`, `ano`, `status`) VALUES
(1, 2, 'informatica', 4, 1),
(2, 3, 'informatica', 4, 1),
(3, 4, 'informatica', 4, 1),
(4, 5, 'informatica', 4, 1),
(5, 6, 'informatica', 4, 1),
(6, 7, 'informatica', 4, 1),
(7, 8, 'informatica', 4, 1),
(8, 9, 'informatica', 4, 1),
(9, 10, 'informatica', 4, 1),
(10, 11, 'informatica', 4, 1),
(11, 12, 'informatica', 4, 1),
(12, 13, 'informatica', 4, 1),
(13, 14, 'informatica', 4, 1),
(14, 15, 'informatica', 4, 1),
(15, 10, 'informatica', 4, 1),
(16, 17, 'informatica', 4, 1),
(17, 18, 'informatica', 4, 1),
(18, 19, 'informatica', 4, 1),
(19, 20, 'informatica', 4, 1),
(20, 21, 'informatica', 4, 1),
(21, 22, 'informatica', 4, 1),
(22, 23, 'informatica', 4, 1),
(23, 24, 'informatica', 4, 1),
(24, 25, 'informatica', 4, 1),
(25, 26, 'informatica', 4, 1),
(26, 56, 'edificacoes', 2, 1),
(27, 57, 'informatica', 2, 1),
(28, 58, 'edificacoes', 3, 1),
(29, 59, 'edificacoes', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eixos`
--

CREATE TABLE `eixos` (
  `id` int(3) NOT NULL,
  `eixo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eixos`
--

INSERT INTO `eixos` (`id`, `eixo`) VALUES
(1, 'Biologicas'),
(2, 'Exatas'),
(3, 'Humanas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `id` int(3) NOT NULL,
  `materia` varchar(20) NOT NULL,
  `eixo_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formacao`
--

INSERT INTO `formacao` (`id`, `materia`, `eixo_id`) VALUES
(1, 'Biologia', 1),
(2, 'Matemática', 2),
(3, 'Física', 2),
(4, 'Química', 2),
(5, 'Informática', 2),
(6, 'Edificações', 2),
(7, 'História', 3),
(8, 'Geografia', 3),
(9, 'Inglês', 3),
(10, 'Espanhol', 3),
(11, 'Filosofia', 3),
(12, 'Sociologia', 3),
(13, 'Português', 3),
(14, 'Ed. Física', 3),
(15, 'Artes', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(3) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `formacao_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `titulo`, `descricao`, `usuario_id`, `formacao_id`) VALUES
(1, 'velocidade', 'Como é a fórmula pra calcular a velocidade?', 2, 3),
(2, 'DP', 'Quais dias q tem DP de tarde?', 20, 2),
(3, 'Prova', 'Q matéria q vai cair na prova', 7, 12),
(4, 'RJ45', 'Onde acho RJ45 pra comprar aqui na cidade?', 10, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(3) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eixo_id` int(3) NOT NULL,
  `formacao_id` int(3) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `usuario_id`, `eixo_id`, `formacao_id`, `status`) VALUES
(1, 30, 3, 13, 1),
(2, 31, 2, 2, 1),
(3, 32, 1, 1, 1),
(4, 33, 2, 5, 1),
(5, 34, 1, 1, 1),
(6, 35, 1, 1, 1),
(7, 36, 3, 8, 1),
(8, 39, 3, 14, 1),
(9, 40, 3, 13, 1),
(10, 41, 2, 5, 1),
(11, 42, 2, 5, 1),
(12, 43, 3, 8, 1),
(13, 44, 2, 3, 1),
(14, 45, 2, 4, 1),
(15, 46, 2, 3, 1),
(16, 47, 2, 5, 1),
(17, 48, 2, 5, 1),
(18, 49, 3, 12, 1),
(19, 50, 3, 9, 1),
(20, 51, 3, 7, 1),
(21, 52, 2, 6, 1),
(22, 53, 3, 11, 1),
(23, 54, 3, 15, 1),
(24, 55, 3, 10, 1),
(25, 60, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(3) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pergunta_id` int(3) NOT NULL,
  `formacao_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `descricao`, `usuario_id`, `pergunta_id`, `formacao_id`) VALUES
(1, 'Tbm quero saber...', 9, 3, 12),
(2, 'Quarta', 12, 2, 2),
(3, 'Não era quinta?', 4, 2, 2),
(4, 'Acho q sobre os pensadores da Grécia', 2, 3, 12),
(5, 'V = S/t', 5, 1, 3),
(6, 'Obrigado!', 2, 1, 3),
(7, 'J&aacute; tentou no camel&ocirc;?', 3, 4, 5),
(8, 'No camel&ocirc; n&atilde;o tem, eu j&aacute; procurei', 11, 4, 5),
(10, '&Eacute; quarta-feira mesmo', 31, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidores`
--

CREATE TABLE `servidores` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servidores`
--

INSERT INTO `servidores` (`id`, `usuario_id`, `status`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` varchar(10) NOT NULL,
  `ra` varchar(12) DEFAULT NULL,
  `siape` varchar(12) DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo_usuario`, `ra`, `siape`, `admin`, `token`) VALUES
(1, 'Admin', 'admin@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'servidor', NULL, '0000000', 1, NULL),
(2, 'Aaron Cardoso Siqueira', 'aaron@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015319591', NULL, 0, NULL),
(3, 'Amanda Rodrigues Catto', 'amanda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015306145', NULL, 0, NULL),
(4, 'Andrey Cassiano Martins', 'andrey@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015319644', NULL, 0, NULL),
(5, 'Beatriz Gonçalves Berta', 'beatriz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307062', NULL, 0, NULL),
(6, 'Douglas Felipe Duarte Silva', 'douglas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307213', NULL, 0, NULL),
(7, 'Eduardo Guimarães Benedeti', 'eduardo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307115', NULL, 0, NULL),
(8, 'Fábio Hideki Ortiz', 'fabio@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307705', NULL, 0, NULL),
(9, 'Gabriel Braz', 'gabrielBraz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307124', NULL, 0, NULL),
(10, 'Gabriel Corradini Siqueira', 'gabrielCorradini@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2147483647', NULL, 0, NULL),
(11, 'Guilherme Pereira Pires de Souza', 'guilhermePereira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307071', NULL, 0, NULL),
(12, 'Guilherme Tolari Bazzo', 'guilhermeTolari@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015319608', NULL, 0, NULL),
(13, 'João Gabriel Gil de Paula', 'joaoGabriel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015314209', NULL, 0, NULL),
(14, 'João Vitor Myszkovski da Costa', 'joaoVitor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015314218', NULL, 0, NULL),
(15, 'José Daniel Trevizam Pagliarini', 'jose@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015306154', NULL, 0, NULL),
(16, 'Kaian de Paula Barbosa', 'kaian@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2147483647', NULL, 0, NULL),
(17, 'Leonardo Marcon Lourençato', 'leonardo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307133', NULL, 0, NULL),
(18, 'Lethiccia Medeiros Corteze', 'lethiccia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307026', NULL, 0, NULL),
(19, 'Marco Aurélio Juliani Paganini', 'marco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015306190', NULL, 0, NULL),
(20, 'Maria Luiza Beltrão Pinto', 'mariaLuiza@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015306181', NULL, 0, NULL),
(21, 'Maria Regina Barbosa Duarte', 'mariaRegina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307142', NULL, 0, NULL),
(22, 'Mateus dos Santos Eduardo', 'mateus@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015314236', NULL, 0, NULL),
(23, 'Murilo Henrique Scatamburlo', 'murilo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307106', NULL, 0, NULL),
(24, 'Rafael Ferreira Simão', 'rafael@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015306163', NULL, 0, NULL),
(25, 'Sabrina Cassiano Martins Biudes', 'sabrina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015314254', NULL, 0, NULL),
(26, 'Weslley de Carvalho Ribeiro', 'weslley@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'aluno', '2015307080', NULL, 0, NULL),
(30, 'Adenilson de Barros de Albuquerque', 'adenilson.albuquerque@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '1234567', 0, NULL),
(31, 'Alex Issamu Moriya', 'alex.issamu@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '2345678', 0, NULL),
(32, 'Alex Sandro Barros de Souza', 'alex.barros@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '3456789', 0, NULL),
(33, 'Cristiano Herculano da Silva', 'cristiano.herculano@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '4567891', 0, NULL),
(34, 'Danilo Sandro Barbosa', 'danilo.barbosa@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '5678912', 0, NULL),
(35, 'David Fernandes de Souza', 'david.fernandes@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '6789123', 0, NULL),
(36, 'Diane Belusso', 'diane.belusso@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '7891234', 0, NULL),
(39, 'Diogo Borsato Peron', 'diogo.peron@ifpr.edu.br', 'd41d8cd98f00b204e9800998ecf8427e', 'professor', NULL, '8912345', 0, NULL),
(40, 'Dirley Aparecida Zolletti Zanerato', 'dirley.aparecida@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '9123456', 0, NULL),
(41, 'Douglas Mariano dos Santos', 'douglas.santos@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '1234567', 0, NULL),
(42, 'Elaine Augusto Praça', 'elaine.augusto@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '2345678', 0, NULL),
(43, 'Jaqueline Moritz', 'jaqueline.moritz@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '3456789', 0, NULL),
(44, 'José Adolfo Mota de Almeida', 'jose.adolfo@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '4567891', 0, NULL),
(45, 'Lincoln Kotsuka da Silva', 'lincoln.kotsuka@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '5678912', 0, NULL),
(46, 'Lucas Campanholi Junior', 'lucas.junior@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '6789123', 0, NULL),
(47, 'Marcelo Antunes Davi', 'marcelo.davi@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '6789123', 0, NULL),
(48, 'Marcelo Rafael Borth', 'marcelo.borth@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '7891234', 0, NULL),
(49, 'Rafael Egídio Leal e Silva', 'rafael. egidio@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '8912345', 0, NULL),
(50, 'Sandra Valéria Dalbello de Mesquita', 'sadra.dalbello@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '9123456', 0, NULL),
(51, 'Silvia Eliane de Oliveira Basso', 'silvia.basso@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '1234567', 0, NULL),
(52, 'Talita Rocha Martins', 'talita.martins@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '2345678', 0, NULL),
(53, 'Tiago Soares dos Santos', 'tiago.santos@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '3456789', 0, NULL),
(54, 'Maria Eduarda Carrenho Fabrin', 'maria.fabrin@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '4567891', 0, NULL),
(55, 'Marcelo Rodrigues', 'marcelo.rodrigues@ifpr.edu.br', 'e10adc3949ba59abbe56e057f20f883e', 'professor', NULL, '5678912', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_id_alunos` (`usuario_id`) USING BTREE;

--
-- Indexes for table `eixos`
--
ALTER TABLE `eixos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eixo_id_formacao` (`eixo_id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_formacao_id_perguntas` (`formacao_id`),
  ADD KEY `fk_usuario_id_perguntas` (`usuario_id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eixo_id_professores` (`eixo_id`),
  ADD KEY `fk_formacao_id_professores` (`formacao_id`),
  ADD KEY `fk_usuario_id_professores` (`usuario_id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_formacao_id_respostas` (`formacao_id`),
  ADD KEY `fk_usuario_id_respostas` (`usuario_id`),
  ADD KEY `fk_pergunta_id_respostas` (`pergunta_id`);

--
-- Indexes for table `servidores`
--
ALTER TABLE `servidores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_id_servidores` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `eixos`
--
ALTER TABLE `eixos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formacao`
--
ALTER TABLE `formacao`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `servidores`
--
ALTER TABLE `servidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
