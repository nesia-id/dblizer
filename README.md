# dblizer

## Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Usage](#usage)
- [Build with](#build-with)
- [TODO](#todo)


## About <a name = "about"></a>

Dblizer helps you to export or reformat your older MySQL database to Excel (Currently). In the next version we aim to support from another database and another export format.

## Getting Started <a name = "getting_started"></a>

Clone this repository.

```
git clone https://github.com/nesia-id/dblizer.git
```
install application dependency
```
composer install
```
## Usage <a name = "usage"></a>

Copy or rename ``.env.exampe`` to ``.env``. Then set your database configuration. ``.env`` file used as default database configuration for `export` command. You can see example in `.env.example`.
```
DB_HOST=your_database_server
DB_PORT=your_database_port
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
## Command
**1. Generate export file**
```
php db make:export [table] [alias]
```
export file used to read your old database table and reformat table's structure to new one. `table` is your table name. this is required option, while `alias` is optional. `alias` is replacement for old table name with new one. `alias` also be used to renamed the export file. 

**2. Export database**
```
php db export:excel [export]
```
**(currently we only support ``excel`` format)**
<br>
`export` is export file located at `/export` folder. `export` argument is optional. If you set `export` argument, then it will only run selected export file. if no argument given, it will run all export files

## Build With <a name = "build-with" ></a>

- [Symfony Console](https://symfony.com/doc/current/components/console.html) - engine
- [ReadbeanPHP](https://www.redbeanphp.com)- database
- [PHPSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet) - spreadsheet library
- [CakePHP Inflector](https://inflector.cakephp.org/) 

## TODO <a name = "todo" ></a>

Database support:

- [x] MySQL / MariaDB
- [ ] PostgreSQL
- [ ] MS-SQL
- [ ] SQLite

Export support:

- [x] Excel 2007+ / Spreadsheet
- [ ] CSV
- [ ] Excel 2003
- [ ] MySQL / MariaDB (SQL File)
- [ ] JSON