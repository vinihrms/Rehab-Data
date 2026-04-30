# 🧠 Sistema de Coleta e Gestão de Dados Científicos
## Projeto Refebi - UNIOESTE

## 🎯 Proposta do Projeto

Este sistema tem como objetivo fornecer uma plataforma web para:
- Criar e gerenciar múltiplos estudos científicos
- Gerenciar participantes vinculados a estudos
- Definir variáveis dinâmicas por estudo (ex: altura, dor, salto)
- Coletar dados em diferentes momentos (visitas)
- Visualizar dados em formato tabular
- Exportar dados para análise estatística (CSV/JSON)


**Stack:**
- Backend: CodeIgniter 4 (PHP)
- Banco de Dados: MySQL
- Servidor Web: PHP embutido

---


## 🚀 Instalação e Configuração

1. Clone este repositório na pasta de arquivos web do seu servidor.
2. Certifique-se de que o servidor com Apache e MySQL está em execução.
3. Migre o banco de dados utilizando o comando:
   ```bash
   php spark migrate
   ```
4. Migre os dados iniciais *obrigatórios* utilizando o comando:
   ```bash
   php spark db:seed main
   ```
5. Renomeie o arquivo `.env.example` para `.env` e atualize as variáveis de ambiente conforme necessário.
6. Execute o servidor PHP usando o comando:
   ```bash
   php spark serve
   ```
7. Abra seu navegador e acesse [http://localhost:8080](http://localhost:8080) para usar o sistema.

---

## 👥 Colaboração
- Faça um fork ou clone do projeto.
- Sempre crie uma branch para novas features/correções.
- Use pull requests para propor mudanças.
- Sincronize com a main usando `git pull` antes de começar a trabalhar.

---

## 🛠️ Observações
- O arquivo `.env` **NÃO** deve ser versionado.

---

## 📚 Sobre
Este sistema é um motor flexível para coleta, armazenamento e análise de dados científicos, pronto para evoluir e ser usado em pesquisas reais de fisioterapia.
# Refebi Data


