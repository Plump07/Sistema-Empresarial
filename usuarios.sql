CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nome`, `Senha`, `Email`, `Usuario`) VALUES
(1, 'Everton Pereira Valeriano', '123456', 'everton@gmail.com', 'everton');