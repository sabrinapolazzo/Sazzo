-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 10:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sazzo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.specials`
--

CREATE TABLE `tb_admin.specials` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin.specials`
--

INSERT INTO `tb_admin.specials` (`id`, `icon`, `subtitle`, `description`) VALUES
(1, 'fa-brands fa-html5', 'HTML5', 'HTML (HyperText Markup Language) é a linguagem fundamental da web. É uma linguagem de marcação que define a estrutura e o conteúdo das páginas da web. Com o HTML, os desenvolvedores podem criar documentos que são interpretados pelos navegadores da web e exibidos aos usuários. Ele fornece uma estrutura básica para elementos como títulos, parágrafos, listas, links e imagens, permitindo que os desenvolvedores organizem e apresentem informações de maneira eficaz. Além disso, o HTML também oferece suporte a recursos avançados, como formulários para coleta de dados e elementos multimídia para incorporar áudio e vídeo.'),
(2, 'fa-brands fa-css3-alt', 'CSS3', 'CSS3 (Cascading Style Sheets) é a linguagem de estilo usada para controlar a apresentação visual de documentos HTML. Com o CSS3, os desenvolvedores podem aplicar estilos personalizados a elementos HTML, como cores, fontes, espaçamento e posicionamento. Isso permite que eles criem layouts visualmente atraentes e responsivos, que se adaptam a diferentes dispositivos e tamanhos de tela. O CSS3 também oferece suporte a recursos avançados, como animações e transições, que podem adicionar dinamismo e interatividade às páginas da web.'),
(3, 'fa-brands fa-js', 'JavaScript', 'JavaScript é uma linguagem de programação de alto nível, dinâmica e orientada a objetos, amplamente usada no desenvolvimento web. Com o JavaScript, os desenvolvedores podem adicionar interatividade e comportamento dinâmico às páginas da web. Ele permite que os desenvolvedores respondam a eventos do usuário, manipulem o conteúdo da página em tempo real e interajam com APIs externas para buscar e enviar dados. JavaScript é executado no lado do cliente, o que significa que é processado no navegador do usuário, tornando-o ideal para criar aplicativos web interativos e responsivos. É uma parte essencial do desenvolvimento web moderno e é suportado por todos os principais navegadores.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.users`
--

CREATE TABLE `tb_admin.users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `type_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin.users`
--

INSERT INTO `tb_admin.users` (`id`, `user`, `name`, `password`, `img`, `type_user`) VALUES
(3, 'Admin2', 'William', 'william', 'sabrina.jpg', 0),
(6, 'Admin', 'Sabrina Polazzo', 'Admin123', 'sabrinaPolazzo.jpg', 2),
(7, 'teste', 'teste', 'Admin123', '65c38f2252b66.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.visits`
--

CREATE TABLE `tb_admin.visits` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin.visits`
--

INSERT INTO `tb_admin.visits` (`id`, `ip`, `day`) VALUES
(1, '::1', '2024-01-27'),
(2, '192.158.2.3', '2024-01-26'),
(3, '::1', '2024-01-27'),
(4, '::1', '2024-01-27'),
(5, '::1', '2024-01-30'),
(6, '::1', '2024-02-02'),
(7, '::1', '2024-02-03'),
(8, '192.168.3.7', '2024-02-03'),
(9, '::1', '2024-02-05'),
(10, '::1', '2024-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name_author` varchar(50) NOT NULL,
  `about_author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_site.config`
--

INSERT INTO `tb_site.config` (`id`, `title`, `name_author`, `about_author`) VALUES
(1, 'Sazzo', 'Sabrina Polazzo', 'Há um ano e meio, mergulhei de cabeça no fascinante mundo da programação, iniciando minha jornada rumo ao desenvolvimento web full stack. Neste período de aprendizado intenso, descobri uma paixão ardente pelo desafiador universo do back-end.<br><br>\r\n\r\n            Meu foco e determinação me conduziram às entranhas dos servidores e bancos de dados, onde a lógica se entrelaça para formar sistemas robustos. Minha jornada no back-end é marcada pela mestria na linguagem PHP, uma ferramenta poderosa para dar forma à funcionalidade de aplicativos web.<br><br>\r\n\r\n            Entretanto, meu interesse não se restringe apenas ao código do servidor. Sou uma habilidosa front-end, navegando com destreza pelos domínios do JavaScript, jQuery, HTML e CSS. Minha compreensão holística do desenvolvimento web me permite criar interfaces intuitivas e dinâmicas, elevando a experiência do usuário.<br><br>\r\n\r\n            Meu entusiasmo vai além do código; abraço desafios com um sorriso, sempre em busca de aprimorar minhas habilidades e explorar novos horizontes tecnológicos. Meu comprometimento com a excelência me impulsiona a seguir as últimas tendências e melhores práticas, garantindo que meus projetos não apenas atendam, mas superem as expectativas.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servico`, `order_id`) VALUES
(3, 'Desenvolvimento de Websites e Aplicativos Web: Isso pode envolver a criação de sites estáticos ou dinâmicos, desde sites institucionais simples até aplicativos web complexos e interativos.', 3),
(4, 'Integração de Sistemas: Integrar sistemas existentes ou de terceiros para garantir que funcionem em conjunto de maneira eficiente e sem problemas. Isso pode envolver a integração de APIs, bancos de dados, sistemas de pagamento, sistemas de gerenciamento de conteúdo, entre outros.', 4),
(5, 'Desenvolvimento de E-commerce: Desenvolver plataformas de comércio eletrônico, incluindo a criação de lojas online personalizadas, integração de sistemas de pagamento, otimização de desempenho e segurança.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.testimonial`
--

CREATE TABLE `tb_site.testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `testimonial` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_site.testimonial`
--

INSERT INTO `tb_site.testimonial` (`id`, `name`, `testimonial`, `date`, `order_id`) VALUES
(16, 'William Junior', 'Fiquei impressionado com a qualidade do atendimento. Sem dúvida, uma experiência positiva do início ', '2024-02-01', 2),
(17, 'Sabrina Polazzo', 'O produto superou minhas expectativas. Ótima qualidade e entrega rápida. Certamente voltarei a fazer negócios! ', '2024-02-02', 1),
(18, 'João da Silva ', 'Atendimento excepcional! A equipe foi muito prestativa e solucionou todas as minhas dúvidas. Parabéns pelo excelente serviço! ', '2024-02-03', 3),
(19, 'Ana luiza de Souza ', 'Estou extremamente satisfeito com o serviço prestado! O profissionalismo da equipe é notável. Recomendo fortemente! ', '2024-01-11', 4),
(20, 'Isabela Lima', 'Estou muito feliz com a compra. O suporte pós-venda é incrível, sempre dispostos a ajudar. Recomendo a todos!', '2024-02-04', 5),
(21, 'Lucas Pereira', 'Recebi meu pedido antes do prazo estipulado e em perfeito estado. Muito satisfeito com a eficiência da empresa. ', '2024-01-03', 6),
(22, 'Fernanda Costa', 'Excelente experiência de compra! Produto de alta qualidade e a entrega foi rápida. Recomendo a todos os meus amigos.', '2024-01-17', 7),
(23, 'Roberto Almeida', 'Fui muito bem atendido desde o primeiro contato. A empresa demonstrou comprometimento com a satisfação do cliente.', '2024-02-01', 8),
(24, 'Juliana Oliveria', 'Adorei a praticidade do site e a variedade de produtos. Encontrei exatamente o que estava procurando. Recomendo!', '2024-02-02', 9),
(25, 'Guilherme Santos', 'Serviço impecável! Profissionais competentes e atenciosos. Estou muito satisfeito e certamente voltarei a fazer negócios.', '2024-01-18', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.specials`
--
ALTER TABLE `tb_admin.specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.users`
--
ALTER TABLE `tb_admin.users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.visits`
--
ALTER TABLE `tb_admin.visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.config`
--
ALTER TABLE `tb_site.config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.testimonial`
--
ALTER TABLE `tb_site.testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_admin.specials`
--
ALTER TABLE `tb_admin.specials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_admin.users`
--
ALTER TABLE `tb_admin.users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_admin.visits`
--
ALTER TABLE `tb_admin.visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_site.config`
--
ALTER TABLE `tb_site.config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_site.testimonial`
--
ALTER TABLE `tb_site.testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
