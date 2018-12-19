INSERT INTO EMPRESA (id_empresa, nome_empresa, cnpj, tipo_empresa) VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', 'Médio/Grande porte');

INSERT INTO PESSOA (id_pessoa, nome_pessoa, email, telefone) VALUES
(1, 'Ewerson Vieira Nascimento', 'ewersonv@gmail.com', '27996187663'),
(2, 'Estefano Vieira', 'estefano@gmail.com', '12312312312'),
(3, 'Deise', 'deise@gmail.com', '27999888998');

INSERT INTO PRODUTO (id_produto, descricao_produto, id_projeto) VALUES
(1, 'O novo tijolo refratário consiste na ideia de ...', 1),
(2, 'O produto teste é composto por ...', 2),
(3, 'Aqui entra a descrição do produto do projet 3', 3),
(4, 'Descrição produto/projeto 4', 4),
(5, 'Mais uma descrição de produto', 5),
(6, 'O produto do projeto 6 realizará tais tarefas e é composto por ...', 6);

INSERT INTO PROJETO (id_projeto, viabilidade, efeitos, equipe, nome_projeto, riscos, entregas, premissas, cronograma, custo, interessados, anotacoes_complementares, id_empresa, id_pessoa) VALUES
(1, 'Este projeto é viável por conta de ...', 'Os efeitos que poderão ser notados aaaa', 'Equipe projeto 1', 'Novo tijolo refratario', 'Riscos 1 aaaa', 'As datas das entregas estão previstas para aaaa', 'O projeto parte das seguintes premissas aaaa', 'Cronograma projeto 1', 'O projeto tem um custo estimado de aaaaaaaaaa', 'As empresas interessadas sao aaa aaa aaa', 'Aqui entram as anotações complementares a respeito do projeto para explicações mais profundas sobre o que será feito', 1, 1),
(2, 'A viabilidade deste projeto se dá por ...', 'Os efeitos que poderão ser notados BBBBbbbbBBBB', 'Equipe do projeto 2', 'Produto teste', 'Riscos 2 BBBBBB', 'As datas das entregas estão previstas para bbbbbbbbbbbb', 'O projeto parte das seguintes premissas BbBbBBbbB', 'Cronograma do projeto 2', 'O projeto tem um custo estimado de BBBBbbbbBBBBbbb', 'As empresas interessadas sao BBB bBB bbb Bbb', 'Aqui entram as anotações complementares a respeito do projeto 2 BBBBBbbBBBB', 2, 2),
(3, 'O projeto é viável porque ...', 'Os efeitos que poderão ser notados CCCcccCCCcc', 'Equipe projeto 3CC', 'Teste teste teste', 'Riscos 3 CccCC', 'As datas das entregas estão previstas para CCCCCCCC', 'O projeto parte das seguintes premissas CCCCC', 'Cronograma projeto 1', 'O projeto tem um custo estimado de CCCCCccccCCCC', 'As empresas interessadas sao CCCCCCC', 'Anotações complementares a respeito do projeto 3 CCCC', 1, 3),
(4, 'A viabilidade do projeto consiste em ...', 'Os efeitos que poderão ser notados 4444444', 'Equipe projeto 4 ddddd', 'Nome do novo projeto 4', 'Riscos 4 dddddd', 'As datas das entregas estão previstas para dddddddddddddddddddd', 'O projeto parte das seguintes premissas 44d4dd4d4', 'Cronograma do projeto 4', 'O projeto tem um custo estimado de 4444444444', 'As empresas interessadas sao 444 dddd DDD', 'Anotações e observações do projeto 4', 3, 1),
(5, 'Este projeto é viável por conta de ...', 'Os efeitos que poderão ser notados em 55555EEE', 'Equipe do projeto 5', 'Mais um produto 55', 'Riscos 5 EEE', 'As datas das entregas estão previstas para 5555eeee', 'O projeto parte das seguintes premissas 55555eeee', 'Cronograma projeto 5E', 'O projeto tem um custo estimado de 55EEEEEEEE', 'As empresas interessadas sao 555 eeee eeee', 'Aqui entram as anotações complementares do projeto 5E', 1, 3),
(6, 'Viabilidade do projeto ...', 'Efeitos do projeto 6 FFFF', 'Equipe do projeto 6', 'Nome do projeto 6 XXXX', 'Riscos do projeto 6 XXXx', 'Aqui entram as datas das entregas do projeto 6 XXXX', 'O projeto 6 parte das seguintes premissas 6666XXXXX', 'Cronograma do projeto 6x', 'O projeto 6 tem um custo estimado de 666666', 'As empresas interessadas no projeto 6 sao XXX xxx', 'Anotações e observações a respeito do projeto 6 XXX', 2, 3);