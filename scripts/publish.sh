# upload de código para o GitHub
echo "Mensagem a enviar para o git: "; read message
# adiciona ao tracking arquivos adicionados
git add .
# commit para o Git
git commit -m $message
# enviar para o repositório remoto
git push origin main || read -p "Insira a branch desejada: " branch; git push origin $branch