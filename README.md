# Teste de programação - Desenvolvedor WordPress/PHP

## Instruções
Nosso desafio é a criação de uma API de lista de compras em PHP.

### Funcionalidades:
- Criar uma lista de compras;
- Adicionar e remover produtos à lista;
- Obter dados de uma lista;
- Adicionar e diminuir quantidades de um produto;
- Duplicar uma lista.

### Entidades:
- Lista de compras: Uma lista com título e listas de produtos;
- Produto: Nome do produto e quantidade de itens na lista.

### O que será avaliado:
- Bom uso de orientação a objetos;
- Design Patterns;
- Arquitetura da aplicação;
- Documentação de instalação;
- Bônus: Coleção do postman com as chamadas dos endpoints;
- Bônus: Otimização do relacionamento entre entidades.

## Instalação e testes
- Faça o clone do repositório em uma instalação do PHP 7.4 ou superior em servidor Apache
- Importe o arquivo `aztectest.sql` do banco de dados localizado na raiz do projeto para criar a base de dados usada neste projeto, atualizando as credenciais na classe `Controllers/Database.php`
- Importe o arquivo de configuração do Insomnia `Insomnia_2023-06-08.json` localizado na raiz do projeto, para testar os endpoints do projeto
- Através do Insomnia, ou similar, faça as requisições para os endpoints do projeto