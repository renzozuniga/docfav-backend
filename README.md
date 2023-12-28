# docfav-backend

Simple REST API for docfav backend

## Project Structure

```
docfav-backend
├─ .env
├─ api
│  ├─ AlternativeUserRepository.php
│  ├─ DbConnection.php
│  ├─ UserController.php
│  └─ UserRepository.php
├─ composer.json
├─ composer.lock
├─ envLoader.php
├─ phpunit.xml
├─ public
│  └─ index.php
├─ README.md
├─ setup.sql
└─ tests
   └─ Feature
      └─ UserTest.php

```

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development purposes.

### Prerequisites

System requirements for this project to work includes:

- Git
- PHP
- Composer
- MySQL
- VS Code

### Running the project

To run the project on your local machine, follow the steps below:

- Clone this repo and navigate to the project folder
- Change the `PROJECT_ENV` variable in the **.env** file to `development`
- Update the config variables in the `DbConnection.php` file contained in the `api` folder to suit your MySQL credentials
- Run the `setup.sql` file in the mysql console with a similar command:

```bash
source path/file.sql
```

- Install all dependencies by running the following command:

```bash
composer install
```

- To start the server, run the following command:

```bash
composer start
```

- To run the unit tests, hange the `PROJECT_ENV` variable in the **.env** file to `test` and run the following command:

```bash
composer test
```
