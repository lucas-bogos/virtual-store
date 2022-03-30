# inicializa o mysql
mysql -u $DBUSR -p || echo "Digite o usuário do banco de dados: "; read dbuser; mysql -u $dbuser -p
