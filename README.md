# 🌟 Projeto Site de RPG - Enciclopédia Interativa

Este é um site privado de RPG desenvolvido com **Laravel** e **XAMPP**, com o objetivo de funcionar como um guia interativo para campanhas e sessões. Nele, os usuários podem **criar, visualizar, editar e excluir** diversos tipos de elementos do mundo de RPG.

---

## 📌 Funcionalidades Principais

O site suporta os seguintes tipos de registros:

- 🐉 **Criaturas**
- ✨ **Magias**
- 🎯 **Habilidades**
- 🌍 **Cenário**
- 🧙‍♂️ **Personagens**
- 🗡️ **Equipamentos**

Para **cada tipo de conteúdo**, o usuário pode:

- ✅ Criar um novo item  
- 👁️ Visualizar informações detalhadas ao clicar no card  
- 📝 Editar os dados existentes  
- 🗑️ Deletar da tabela o item  

---

## 💾 Funcionalidade Extra: Exportação e Importação de Dados

O sistema possui uma funcionalidade para **salvar todos os dados da tabela de criaturas** em um arquivo **Seeder**. Isso permite que você guarde ou compartilhe o estado atual da base de dados de criaturas facilmente.

### ✅ Como salvar os dados das criaturas atuais

Um botão no site gera automaticamente um seeder com todas as criaturas registradas, localizado em:

```
database/seeders/GuiaRPGSeeder.php
```

### 🔄 Como restaurar os dados usando o seeder

Caso a tabela `criaturas` seja apagada ou o sistema precise ser reiniciado, basta executar o comando abaixo para recarregar os dados salvos:

```bash

php artisan db:seed --class=GuiaRPGSeeder

```

---

## ⚙️ Tecnologias Utilizadas

- Laravel
- XAMPP

---

## 🚧 Status do Projeto

- ✅ **Criaturas**
- ✅ **Equipamento**
  - CRUD completo
  - Exportação/importação via Seeder

- 🔧 **Outros tipos (Personagem, Magia, etc.)**
  - Em desenvolvimento

---

## 📁 Estrutura de Diretórios (Atual)

```
seu-projeto/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Controller.php
│   │       ├── CriaturaController.php
│   │       ├── EquipamentoController.php
│   │       ├── ExportSeederController.php
│   │       └── HomeController.php
│   │       ├── SeederExecController.php
│   └── Models/
│       ├── Criatura.php
│       └── Equipamento.php
├── database/
│   ├── migrations/
│   │   └── xxxx_xx_xx_xxxxxx_create_criaturas_table.php
│   │   └── xxxx_xx_xx_xxxxxx_create_equipamentos_table.php
│   └── seeders/
│       └── GuiaRPGSeeder.php
├── public/
│   └── Assets/
│       ├── character.png
│       ├── magia.png
│   └── css/
│       ├── buttons.css
│       ├── ficha.create.css
│       ├── ficha.view.css
│       ├── home.blade.php
│       ├── sidebar.php
│   └── js/
│       ├── home.js
├── resources/
│   └── views/
│       ├── home.blade.php
│       └── layouts/
│           ├── app.blade.php
│       └── criaturas/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
│       └── equipamentos/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php
```

---

## ✍️ Autoria

**Author:** Frost Salazar
