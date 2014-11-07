<center><h2>Trabalho Prático – HTML, CSS, PHP e MySQL<h2><center>

<strong>Disciplina:</strong> Programação para Internet I<br />
<strong>Turma:</strong> ADS4N14/2A<br />
<strong>Professora:</strong> Sirlei Inês Sulzbach Isaia<br />
<strong>Grupo:</strong> Carlos Schwarz, Guilherme Fraga, Rafael Rodrigues e Wagner Cardoso<br />



<center><h1>Sistema de Loot Cone Legion</h1></center>


Trata-se de um sistema para controlar e equilibrar a distribuição de recompensas em jogos eletrônicos.

No jogo World of Warcraft temos um modo de jogo chamado instância, em especial Raid. Elas consistem de jogadores de 10-30 participantes, onde os componentes são invariáveis, comumente chamado de “Core”. Eles enfrentam um número variado de “Chefes”, que fornecem recompensas randômicas quando são derrotados. Caso dois ou mais jogadores queiram um item específico, é necessário que haja um critério de escolha para determinar quem o receberá. O critério mais utilizado é deixar a sorte resolver. Porém, ao longo do tempo, isto leva a um problema de desbalanceamento da distribuição, onde um jogador é mais beneficiado que o outro, causando descontentamento e uma possível cisão do grupo.

Considerando que essas instâncias são repetidas toda semana, visando obter os melhores itens específicos para cada personagem, é necessário um método que controle esta distribuição, baseado em regras de conhecimento de todo grupo. 

O sistema contará com módulos de visualização, cadastro, administração e acompanhamento das tabelas de prioridade de itens.

Todos os usuários terão um login e senha onde poderão visualizar o histórico de itens que já ganharam, assim como sua posição na prioridade de obter um próximo item.

Tecnologias envolvidas: HTML, PHP, MySQL, CSS e JS. Serão utilizadas: a biblioteca Jquery,  framework ORM Doctrine (PHP).

<center><h2>Módulos:</h2></center>

<center><h3>Módulo de Login</h3></center>
Módulo responsável pela validação de acesso dos usuários.

<center><h3>Módulo de Cadastro</h3></center>
Módulo onde os usuários poderão se cadastrar e posteriormente atualizar as suas informações (user e character).

<center><h3>Módulo de Administração</h3></center>
Módulo de administração onde os Administradores do sistema poderão aceitar novas inscrições e montar os cores.

<center><h3>Módulo de Controle de loots</h3></center>
Módulo onde o Raid Leader gerenciará a progressão do core, mantendo atualizado o registro dos players, registrando loots e presenças/faltas.

<center><h3>Módulo de Acompanhamento</h3></center>
Módulo onde os players poderão acompanhar o andamento do core, visualizando a tabela de prioridades de loot.<br /><br /><br />

Obs.: <br />
•	Algumas regras de negócio ainda não foram definidas; <br />
•	Usuários precisarão estar cadastrados para utilizar os módulos (exceto o de cadastro);<br />
•	Usaremos exclusão lógica;<br />
•	Mais módulos provavelmente serão adicionados posteriormente ao projeto.<br />
