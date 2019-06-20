# ursb-Lite
The lite system for company registration by the Uganda Registration Services Bureau (URSB).


- [Installation](#installation)
  - [1. Windows](#windows)
  - [2. Linux](#linux)
- [Configuration](#configuration)
- [Platforms](#platforms)
- [License & Copyright](#license)
- [Development](#development)

## Installation

The project can either be installed on a linux server or a windows server given the choice of the operating system from the above.
Please make sure you have [Composer](http://getcomposer.org/) installed.

### Windows

If you have [Git](https://git-scm.com/) download the project by opening a command prompt (cmd) in the *www* or *htdocs* of the local server and start *Apache & MySQL*. Clone the repo as this

```bash
    git clone https://github.com/BrunoNicholas/ursb-lite.git
```

or download the folder and extract the file in the server directory environment

The default link for the app is

```url
    http://localhost/utamu_cu/public/api/
```

### Linux

Make sure you have your local server working well, for instance LAMP for Linux e.g Ubuntu.
Find out how to run Laravel installation on Apache server and know the name of *YOUR_FOLDER* from which you will call the project after clonning it in the example above for windows installation.

```bash
    http://localhost/YOUR_FOLDER/api/
 ```

Likewise you might use the artisan command on the internal Laravel server as and

 ```bash
    composer install
    composer update
    php artisan serve --port 5000
 ```

 NB: You can either exclude *--port 5000* for the default port 8000 or use any available of choice.

## Configuration

Next step is to configure the project. If you are using linux, browse into your project directory with the terminal and enter the command

```bash
    cp .env.example .env
```

If you are on windows, locate the *.env.example* file, copy all its content and create a new file called *.env*, paste it all and update these Fields to your created database name. In this case, it is *db_ursb*

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ursb
DB_USERNAME=root
DB_PASSWORD=password
```

either use the bash command to use a fresh database

```bash
    php artisan migrate --seed
    php artisan passport:install
```

Make sure to create the App Security Key which is automatically generated with this command

```bash
    php artisan key:generate 
```

After that, make another simple command to prepare the storage of the uploads


or just import the attached database script file *.sql* to use the given database

NB: *1* in the route above can be any number of choice, make sure you made the [Configuration](#configuration). This route needs authentication.

## Platforms

This project is designed to be a web application that is sstaged into the following:

1. The Enterprise Resource Planning (ERP)

This other section gives room for all other users to have accounts, have content shared from user to user, section to section, and above it all, the user rights and privileges at different stages. The ERP handles confidentiality of all resources, content and usage of the system. That is why different privileges are given like, Administrator, User, Guest among others.

The Application is platform indipendent and thus can operate well on any device, work with different other programming languages.

## License

The URSB Lite Web Application is of the MIT License but strictly a property of Reuben Idro as referenced by [Bruno Nicholas](#developement).

## Development

```The URSB Lite v1.0 is proudly developed by Bruno Nicholas```

*[Gmail](mailto:sbnibro256@gmail.com)*, *[Outlook](mailto:bruno.nicholas@outlook.com)*, *[Facebook](https://facebook.com/bruno.nicholas1)*, *[Twitter](https://twitter.com/Brunonicholas2)*, *[LinkedIn](https://www.linkedin.com/in/bruno-nicholas-9454b3108/)*
