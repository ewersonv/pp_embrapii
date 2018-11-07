INSERT INTO empresa (id_empresa, nome_empresa, cnpj, tipo_empresa) VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', 'Médio/Grande porte');

INSERT INTO pessoa (id_pessoa, nome, email, telefone, tipo_representante, cargo) VALUES
(1, 'Ewerson Vieira Nascimento', 'ewersonv@gmail.com', '27996187663', 'do IFES', 'Bolsista'),
(2, 'Estefano Vieira', 'estefano@gmail.com', '12312312312', 'do IFES', 'asdasd'),
(3, 'Deise', 'deise@gmail.com', '27999888998', 'do IFES', 'Coordenadora');

INSERT INTO produto (id_produto, nome_produto, justificativa) VALUES
(1, 'Novo tijolo refratario', 'A criação do produto é justificada por causa de blabla'),
(2, 'Produto teste', 'Justificativa aparece aqui'),
(3, 'Teste teste teste', 'Aqui entra a justificativa');

INSERT INTO projeto (id_projeto, riscos, restricoes, partes_interessadas, entregas, premissas, efeitos, requisitos, custo) VALUES
(1, 'Riscos 1 aaaa', 'Restricoes aaaaaa', 'As empresas interessadas sao aaa aaa aaa', 'As datas das entregas estão previstas para aaaa', 'O projeto parte das seguintes premissas aaaa', 'Os efeitos que poderão ser notados aaaa', 'Este projeto depende dos seguintes requisitos aaaaa', 'O projeto tem um custo estimado de aaaaaaaaaa'),
(2, 'Riscos 2 bbbb', 'Restricoes bbbbbbbbbb', 'As empresas interessadas sao bbbbBBBbb', 'As datas das entregas estão previstas para bbbbbb', 'O projeto parte das seguintes premissas bbbbbb', 'Os efeitos que poderão ser notados bbbbbbbbbb', 'Este projeto depende dos seguintes requisitos bbbbbbbbbb', 'O projeto tem um custo estimado de bbbbBBBBBB'),
(3, 'Riscos 3 CCCCC', 'Restricoes CCCCCC', 'As empresas interessadas sao CCCccccCCCC', 'As datas das entregas estão previstas para CCCCCCCC', 'O projeto parte das seguintes premissas CCCCC', 'Os efeitos que poderão ser notados CCCcccCC', 'Este projeto depende dos seguintes requisitos CCccC', 'O projeto tem um custo estimado de CCCccccCCC');

INSERT INTO proposta (id_proposta, tipo_proposta, resumo_proposta, fk_id_empresa, fk_id_pessoa, fk_id_produto, fk_id_projeto) VALUES
(1, 'Projeto de inovação', 'Aqui ficam as informações da proposta prospectada, para que haja uma conversa posteriormente a fim de detalhar melhor as especificações do projeto.', 1, 1, 1, 1),
(2, 'Projeto de inovação', 'asdadsasddsad\r\nas\r\ndsa\r\ndsa\r\ndsa\r\ndsa\r\nads\r\ndsa\r\nasd\r\nsad\r\nasd\r\nasdasdasd\r\nasd\r\nasd\r\na\r\ndsa\r\nds', 2, 2, 2, 2),
(3, 'Prestação de serviço tecnológica', 'nafsnsaçasfnçasnfçlkansflçkansfçkansfaksnfçaksnfçansfaksnfasfkaknfçançkfçknafçnkfnkçfasnkçfasknçfasfasfas\r\nfanfsa\r\nfasn\r\nfs\r\nff\r\nsankfnkçfsaknçfskçnfsaçknfasçkn\r\n\r\n\r\nankasfnkfasknçafsçkçfknsakfçnasknçfas\r\n\r\n\r\nkfanççknafskçnafsçknmafs\r\n\r\nafknçafsçknfkaçsçknfam\r\n\r\nafknasknfçasçkmnfasçknfas', 3, 3, 3, 3);