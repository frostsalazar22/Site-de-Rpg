# 🌟 Projeto Site de RPG - Enciclopédia Interativa

Este é um site privado de RPG desenvolvido com **Laravel** e **XAMPP**, com o objetivo de funcionar como um guia interativo para campanhas e sessões. Nele, os usuários podem **criar, visualizar, editar e excluir** diversos tipos de elementos do mundo de RPG.

---

## 📌 Funcionalidades Principais

O site suporta os seguintes tipos de registros:

- 🐉 **Criaturas**
- 🗡️ **Equipamentos**
- 🧙‍♂️ **Personagens**
- ✨ **Magias**
- 🎯 **Habilidades**
- 🌍 **Cenários**

Para **cada tipo de conteúdo**, o usuário pode:

- ✅ Criar um novo item  
- ✅ Visualizar informações detalhadas ao clicar no card  
- ✅ Editar os dados existentes  
- ✅ Deletar da tabela o item  

---

## 💾 Funcionalidade Extra: Exportação e Importação de Dados

O sistema possui uma funcionalidade para **salvar todos os dados de Criaturas, Equipamentos e Personagens** em um único arquivo **Seeder**, facilitando backup e portabilidade.

### ✅ Como salvar os dados atuais

Um botão no site gera automaticamente um seeder com todos os registros, localizado em:

```
database/seeders/GuiaRPGSeeder.php
```

### 🔄 Como restaurar os dados usando o seeder

Caso as tabelas sejam apagadas ou o sistema precise ser reiniciado, basta executar o comando abaixo:

```bash
php artisan db:seed --class=GuiaRPGSeeder
```

---

## ⚙️ Tecnologias Utilizadas

* Laravel
* XAMPP

---

## 🛠️ Manutenção de Arquivos

Para que as imagens enviadas fiquem visíveis nas views, execute:

```bash
php artisan storage:link
```

---

## 🚧 Status do Projeto

* ✅ **Criaturas**
* ✅ **Equipamentos**
* ✅ **Personagens**
* ✅ **Magias**
* ✅ **Habilidades**
* ✅ **Cenários**

  * CRUD completo
  * Exportação/importação via Seeder

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
│   │       ├── PlayerController.php
│   │       ├── MagiaController.php
│   │       ├── HabilidadeController.php
│   │       ├── CenarioController.php
│   │       ├── ExportSeederController.php
│   │       ├── SeederExecController.php
│   │       └── HomeController.php
│   └── Models/
│       ├── Criatura.php
│       ├── Equipamento.php
│       ├── Player.php
│       ├── Magia.php
│       ├── Habilidade.php
│       └── Cenario.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_xx_xx_xxxxxx_create_criaturas_table.php
│   │   ├── xxxx_xx_xx_xxxxxx_create_equipamentos_table.php
│   │   ├── xxxx_xx_xx_xxxxxx_create_players_table.php
│   │   ├── xxxx_xx_xx_xxxxxx_create_magias_table.php
│   │   ├── xxxx_xx_xx_xxxxxx_create_habilidades_table.php
│   │   └── xxxx_xx_xx_xxxxxx_create_cenarios_table.php
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
│       ├── home.css
│       ├── sidebar.css
│   └── js/
│       └── home.js
├── resources/
│   └── views/
│       ├── home.blade.php
│       └── layouts/
│           └── app.blade.php
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
│       └── players/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
│       └── magias/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
│       └── habilidades/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
│       └── cenarios/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php
```

---

## ✍️ Autoria

**Autor:** Frost Salazar
