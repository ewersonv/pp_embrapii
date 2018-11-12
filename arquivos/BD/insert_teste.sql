INSERT INTO empresa (id_empresa, nome_empresa, cnpj, tipo_empresa) VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', 'Médio/Grande porte');

INSERT INTO pessoa (id_pessoa, nome_pessoa, email, telefone, tipo_representante, cargo) VALUES
(1, 'Ewerson Vieira Nascimento', 'ewersonv@gmail.com', '27996187663', 'do IFES', 'Bolsista'),
(2, 'Estefano Vieira', 'estefano@gmail.com', '12312312312', 'do IFES', 'asdasd'),
(3, 'Deise', 'deise@gmail.com', '27999888998', 'do IFES', 'Coordenadora');

INSERT INTO produto (id_produto, nome_produto, justificativa) VALUES
(1, 'Novo tijolo refratario', 'A criação do produto é justificada por causa de blabla'),
(2, 'Produto teste', 'Justificativa aparece aqui'),
(3, 'Teste teste teste', 'Aqui entra a justificativa'),
(4, 'Produto novo 1', '11111111111111111111111la'),
(5, 'Mais um produto', 'Mais um Mais um Mais um Mais um Mais um Mais um Mais um'),
(6, 'Produto inovador X', 'XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX');

INSERT INTO projeto (id_projeto, riscos, restricoes, partes_interessadas, entregas, premissas, efeitos, requisitos, custo, equipe, cronograma) VALUES
(1, 'Riscos 1 aaaa', 'Restricoes aaaaaa', 'As empresas interessadas sao aaa aaa aaa', 'As datas das entregas estão previstas para aaaa', 'O projeto parte das seguintes premissas aaaa', 'Os efeitos que poderão ser notados aaaa', 'Este projeto depende dos seguintes requisitos aaaaa', 'O projeto tem um custo estimado de aaaaaaaaaa', 'Cronograma projeto 1', 'Equipe projeto 1'),
(2, 'Riscos 2 bbbb', 'Restricoes bbbbbbbbbb', 'As empresas interessadas sao bbbbBBBbb', 'As datas das entregas estão previstas para bbbbbb', 'O projeto parte das seguintes premissas bbbbbb', 'Os efeitos que poderão ser notados bbbbbbbbbb', 'Este projeto depende dos seguintes requisitos bbbbbbbbbb', 'O projeto tem um custo estimado de bbbbBBBBBB', 'Cronograma projeto 2', 'Equipe projeto 2'),
(3, 'Riscos 3 CCCCC', 'Restricoes CCCCCC', 'As empresas interessadas sao CCCccccCCCC', 'As datas das entregas estão previstas para CCCCCCCC', 'O projeto parte das seguintes premissas CCCCC', 'Os efeitos que poderão ser notados CCCcccCC', 'Este projeto depende dos seguintes requisitos CCccC', 'O projeto tem um custo estimado de CCCccccCCC', 'Cronograma projeto 3', 'Equipe projeto 3'),
(4, 'Riscos projeto4projeto4projeto4projeto4projeto4', 'Restricoes projeto4', 'As empresas no projeto4', 'As datas das entregas do projeto4', 'O projeto4 parte das seguintes premissas aaaa', 'Os efeitos do projeto4', 'projeto4 depende dos seguintes requisitos', 'O projeto4 tem um custo estimado de 999999', 'Cronograma projeto 4', 'Equipe projeto 4'),
(5, 'Riscos de mais um projeto', 'Restricoes de mais um projeto', 'As empresas interessadas em mais um projeto', 'As datas das entregas de mais um projeto', 'Premissas de mais um projeto', 'Os efeitos que poderão ser notados de mais um projeto', 'Mais um projeto que depende dos seguintes requisitos', 'Mais um projeto que tem um custo estimado de ', 'Cronograma projeto 5', 'Equipe projeto 5'),
(6, 'Riscos XXXXXX', 'Restricoes XXXXXX', 'As empresas interessadas sao XXXXXXXXXXXX', 'As datas das entregas estão previstas para XXXXXXXXXXXX', 'O projeto parte das seguintes premissas XXXXXXXXXXXX', 'Os efeitos que poderão ser notados XXXXXXXXXXXXXXXXXX', 'Este projeto depende dos seguintes requisitos XXXXXX', 'O projeto tem um custo estimado de XXXXXXXXXXXX', 'Cronograma projeto XXX', 'Equipe projeto XXX');

INSERT INTO proposta (id_proposta, tipo_proposta, resumo_proposta, fk_id_empresa, fk_id_pessoa, fk_id_produto, fk_id_projeto) VALUES
(1, 'Projeto de inovação', 'Aqui ficam as informações da proposta prospectada, para que haja uma conversa posteriormente a fim de detalhar melhor as especificações do projeto.', 1, 1, 1, 1),
(2, 'Projeto de inovação', 'asdadsasddsad\r\nas\r\ndsa\r\ndsa\r\ndsa\r\ndsa\r\nads\r\ndsa\r\nasd\r\nsad\r\nasd\r\nasdasdasd\r\nasd\r\nasd\r\na\r\ndsa\r\nds', 2, 2, 2, 2),
(3, 'Prestação de serviço tecnológica', 'nafsnsaçasfnçasnfçlkansflçkansfçkansfaksnfçaksnfçansfaksnfasfkaknfçançkfçknafçnkfnkçfasnkçfasknçfasfasfas\r\nfanfsa\r\nfasn\r\nfs\r\nff\r\nsankfnkçfsaknçfskçnfsaçknfasçkn\r\n\r\n\r\nankasfnkfasknçafsçkçfknsakfçnasknçfas\r\n\r\n\r\nkfanççknafskçnafsçknmafs\r\n\r\nafknçafsçknfkaçsçknfam\r\n\r\nafknasknfçasçkmnfasçknfas', 3, 3, 3, 3),
(4, 'Projeto de inovação', 'AAAAAAAAAAAAAAAAAAAAAAA', 1, 1, 4, 4),
(5, 'Projeto de inovação', 'BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB', 2, 2, 5, 5),
(6, 'Prestação de serviço tecnológica', 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', 3, 3, 6, 6);