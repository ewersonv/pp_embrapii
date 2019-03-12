INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `tipo`) VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', 'Médio/Grande porte'),
(4, 'Empresa7', '12123444433377', 'EPP');

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `senha`, `tipo`) VALUES
(1, 'Ewerson Vieira Nascimento', '27996187663', 'ewersonv@gmail.com', '$2y$10$MPhusuCtvl5vgguXLjaLZu011yV8HQwbvxbhJGG/iX0bqK8/mBGRC', 1),
(2, 'Estefano Vieira', '12312312312', 'estefano@gmail.com', '$2y$10$zudQ8X0bx3fNXyGiULey5OccHJJcrqYmI7wGcWBDKDIwm9bhGw6RW', 1),
(3, 'Deise', '27999888998', 'deise@gmail.com', '$2y$10$rWGo13UN0rT/RHJR7IJIj.xqIGLZ.iWFktn88kXb3xEfIb0R8XKI2', 1),
(4, 'Pessoa7', '27123457777', 'pessoa7@email.com', '$2y$10$qDA0IO9N6XEmAntmRu3gbuH8eYkBQJojO2gMO.0jhQUGSOFJl0AlK', 0);

INSERT INTO `projeto` (`id`, `nome`, `viabilidade`, `efeitos`, `equipe`, `riscos`, `entregas`, `premissas`, `cronograma`, `custo`, `interessados`, `anotacoes_complementares`, `created`, `modified`, `fk_id_empresa`, `fk_id_usuario`) VALUES
(1, 'Novo tijolo refratario', 'Este projeto é viável por conta de ...', 'Os efeitos que poderão ser notados aaaa', 'Equipe projeto 1', 'Riscos 1 aaaa', 'As datas das entregas estão previstas para aaaa', 'O projeto parte das seguintes premissas aaaa', 'Cronograma projeto 1', 'O projeto tem um custo estimado de aaaaaaaaaa', 'As empresas interessadas sao aaa aaa aaa', 'Aqui entram as anotações complementares a respeito do projeto para explicações mais profundas sobre o que será feito', '2018-11-13 00:00:00', NULL, 1, 1),
(2, 'Produto teste', 'A viabilidade deste projeto se dá por ...', 'Os efeitos que poderão ser notados BBBBbbbbBBBB', 'Equipe do projeto 2', 'Riscos 2 BBBBBB', 'As datas das entregas estão previstas para bbbbbbbbbbbb', 'O projeto parte das seguintes premissas BbBbBBbbB', 'Cronograma do projeto 2', 'O projeto tem um custo estimado de BBBBbbbbBBBBbbb', 'As empresas interessadas sao BBB bBB bbb Bbb', 'Aqui entram as anotações complementares a respeito do projeto 2 BBBBBbbBBBB', '2018-11-12 22:37:15', NULL, 2, 2),
(3, 'Teste teste teste', 'O projeto é viável porque ...', 'Os efeitos que poderão ser notados CCCcccCCCcc', 'Equipe projeto 3CC', 'Riscos 3 CccCC', 'As datas das entregas estão previstas para CCCCCCCC', 'O projeto parte das seguintes premissas CCCCC', 'Cronograma projeto 1', 'O projeto tem um custo estimado de CCCCCccccCCCC', 'As empresas interessadas sao CCCCCCC', 'Anotações complementares a respeito do projeto 3 CCCC', '2018-11-12 22:39:14', NULL, 1, 3),
(4, 'Nome do novo projeto 4', 'A viabilidade do projeto consiste em ...', 'Os efeitos que poderão ser notados 4444444', 'Equipe projeto 4 ddddd', 'Riscos 4 dddddd', 'As datas das entregas estão previstas para dddddddddddddddddddd', 'O projeto parte das seguintes premissas 44d4dd4d4', 'Cronograma do projeto 4', 'O projeto tem um custo estimado de 4444444444', 'As empresas interessadas sao 444 dddd DDD', 'Anotações e observações do projeto 4', '2018-11-12 22:41:21', NULL, 3, 1),
(5, 'Mais um produto 55', 'Este projeto é viável por conta de ...', 'Os efeitos que poderão ser notados em 55555EEE', 'Equipe do projeto 5', 'Riscos 5 EEE', 'As datas das entregas estão previstas para 5555eeee', 'O projeto parte das seguintes premissas 55555eeee', 'Cronograma projeto 5E', 'O projeto tem um custo estimado de 55EEEEEEEE', 'As empresas interessadas sao 555 eeee eeee', 'Aqui entram as anotações complementares do projeto 5E', '2018-12-11 22:42:49', NULL, 1, 3),
(6, 'Nome do projeto 6 XXXX', 'Viabilidade do projeto ...', 'Efeitos do projeto 6 FFFF', 'Equipe do projeto 6', 'Riscos do projeto 6 XXXx', 'Aqui entram as datas das entregas do projeto 6 XXXX', 'O projeto 6 parte das seguintes premissas 6666XXXXX', 'Cronograma do projeto 6x', 'O projeto 6 tem um custo estimado de 666666', 'As empresas interessadas no projeto 6 sao XXX xxx', 'Anotações e observações a respeito do projeto 6 XXX', '2018-12-13 22:48:27', NULL, 2, 3),
(7, 'Projeto 7', 'Viabilidade do Projeto 7', 'Efeitos resultantes do Projeto 7', 'Equipe do Projeto 7', 'Riscos do Projeto 7', 'Entregas do Projeto 7', 'Premissas do Projeto 7', 'Cronograma de atividades do Projeto 7', 'Custo do Projeto 7', 'Empresas interessadas no Projeto 7', 'Informações adicionais do Projeto 7', '2019-01-14 22:52:37', NULL, 4, 4),
(8, 'projeto 8', 'é viável', 'muitos efeitos legais', 'uma galera aí', 'um risco ou dois', 'vamos entregar', 'partimos do pressuposto que', 'tamo fazendo', 'bastante', 'algumas pessoas', 'tá bom já', '2019-03-11 23:05:52', NULL, 5, 1);

INSERT INTO `produto` (`id`, `nome`, `descricao`, `fk_id_projeto`) VALUES
(1, 'Tijolo refratário', 'O novo tijolo refratário consiste na ideia de ...', 1),
(2, 'Produto teste', 'O produto teste é composto por ...', 2),
(3, 'Produto projeto 3', 'Aqui entra a descrição do produto do projet 3', 3),
(4, 'Produto do projeto 4', 'Descrição produto/projeto 4', 4),
(5, 'Nome de mais um produto', 'Mais uma descrição de produto', 5),
(6, 'Produto do projeto 6', 'O produto do projeto 6 realizará tais tarefas e é composto por ...', 6),
(7, 'Produto do Projeto 7', 'Descrição do produto do Projeto 7', 7);