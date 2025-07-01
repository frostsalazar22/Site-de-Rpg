**Projeto Site de RPG - Enciclopédia Interativa**
Este é um site privado de RPG desenvolvido com Laravel e XAMPP, com o objetivo de funcionar como um guia interativo para campanhas e sessões. Nele, os usuários podem criar, visualizar, editar e excluir diversos tipos de elementos do mundo de RPG.

**Funcionalidades Principais**
O site suporta os seguintes tipos de registros:

**Criaturas**

 Magias

 Habilidades

 Cenário

 Personagens

 Equipamentos

Para cada tipo de conteúdo, o usuário pode:

Criar um novo item

Visualizar informações detalhadas clicando no card

Editar os dados existentes

Deletar da tabela o item

**Funcionalidade Extra: Exportação e Importação de Dados**
O sistema possui uma funcionalidade para salvar todos os dados da tabela de criaturas em um arquivo Seeder. Isso permite que você guarde ou compartilhe o estado atual da base de dados de criaturas facilmente.

**Como salvar os dados das criaturas atuais:**
Um botão no site gera automaticamente um seeder com todas as criaturas registradas, localizado em:

database/seeders/CriaturaSeeder.php

**Como restaurar os dados usando o seeder:**
Caso a tabela criaturas seja apagada ou o sistema precise ser reiniciado, basta executar o comando abaixo para recarregar os dados salvos:

php artisan db:seed --class=CriaturaSeeder

Tecnologias Utilizadas
Laravel
XAMPP

**Status do Projeto**
*Criaturas*
CRUD completo
Função de exportar/importar criaturas via Seeder


Funcionalidades para outros tipos (personagem, magia, etc.) em desenvolvimento

**Estrutura de Diretórios (Atual)**

seu-projeto/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ExportSeederController.php
│   │   │   ├── CriaturaController.php
│   │   │   ├── HomeController.php
│   ├── Models/
│   │   ├── Criatura.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_xx_xx_xxxxxx_create_criaturas_table.php
├── database/
│   └── seeders/
│       └── CriaturaSeeder.php
├── resources/
├── resources/
│   └── views/
│       ├── home.blade.php
│       ├── criaturas/
│       │   ├── app.blade.php
│       ├── criaturas/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── show.blade.php
├── routes/
│   └── web.php

**Authoria**
author: Frost Salazar