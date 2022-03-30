# automatiza a execução de shemas sql
echo "Qual shema SQL deseja executar? [file.sql]"; read file
mysql -u $DBUSR -p || echo "Digite o usuário do banco de dados: "; read dbuser; mysql -u $dbuser -p