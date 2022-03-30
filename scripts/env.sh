# guia para a configuração de variáveis de ambiênte
echo "Qual é o driver de banco de dados que deseja configurar? "; read driver
echo "Em qual hospedagem está o servidor do seu banco? "; read dbhost
echo "Digite o usuário: "; read dbuser
echo "Digite a senha para o usuário $dbuser: "; read dbpass
echo "Qual é o nome do banco de dados? "; read dbname

# define as variáveis
export DRIVER=$driver || set DRIVER=%driver%
export DBHOST=$dbhost || set DBUSR=%dbhost%
export DBUSER=$dbuser || set DBUSER=%dbuser%
export DBPASS=$dbpass || set DBPASS=%dbpass%
export DBNAME=$dbname || set DBNAME=%dbname%

echo "Seu ambiênte dev está pronto para uso!"