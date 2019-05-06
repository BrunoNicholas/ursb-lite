# URSB Portal Lite

The lite system for company registration and followup by the Uganda Registration Services Bureau (URSB). This system is designed for the operations at the URSB with different functional requirements implemented like
- Auto update of the status of records
- Email notifications
- User and record management/Usage control
- Company owner management records

## The project scope and usage

- [Installation](#installation)
  - [1. Windows](#windows)
  - [2. Linux](#linux)
- [Configuration](#configuration)
  - [Notes for usage](#notes)
- [API Usage](#usage)
  - [Getting All](#getting-all)
    - [Users](#users)
    - [Messages](#messages)
    - [Companies](#companies)
    - [Departments](#departments)
    - [Defaulters](#defaulters)
  - [Getting One](#one)
  - [Create Item](#create-item)
  - [Edit Item](#edit-item)
  - [Deleting Item](#deleting-item)
- [Platforms](#platforms)
- [License & Copyright](#license)
- [Development](#development)

## Installation

The project can either be installed on a linux server or a windows server given the choice of the operating system from the above.

### 1. Windows

If you have [Git](https://git-scm.com/) download the project by opening a command prompt (cmd) in the *www* or *htdocs* of the local server and start *Apache & MySQL*. Clone the repo as this

```bash
    git clone https://github.com/BrunoNicholas/ursb-lite.git
```

or download the folder and extract the file in the server directory environment

The default link for the app is

```url
    http://localhost/ursb_lite/public/
```

### 2. Linux

Make sure you have your local server working well, for instance LAMP for Linux e.g Ubuntu that is if you are intending to use the project in the production server not the developement server which is embedded into the application.

Find out how to run Laravel installation on Apache server and know the name of *YOUR_FOLDER* from which you will call the project after clonning it in the example above for windows installation.

```bash
    http://localhost/YOUR_FOLDER/api/
 ```

If you intend to just have the project in developement, just clone it, enter it and just type the command after finishing database migrations and all. The default port is 8000 but you can change it on choice.

```bash
	php artisan serve
```

Likewise you might use the artisan command on the internal Laravel server as and

 ```bash
    composer install
    php artisan serve --port 5000
 ```

 NB: You can either exclude *--port 5000* for the default port 8000 or use any available of choice. In this case, here is the url

 ```bash
    http://localhost:5000/api/
 ```

## Configuration

Next step is to configure the project. Locate the *.env.example*, copy all its content and create a new file called *.env* and update these Fields to your created database name. In this case, it is *db_utamu*

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
    php artisan migrate
    php artisan db:seed
    php artisan passport:install
```

Make sure to create the App Security Key which is automatically generated with this command

```bash
    php artisan key:generate 
```

After that, make another simple command to prepare the storage of the uploads

```bash
    php artisan storage:link
```

or just import the attached database script file *.sql* to use the given database

## API Usage

### Getting All

| **Request** | **Route** | **Category**   |
| ----------- | --------- | -------------- |
| *GET* | ```http://localhost:5000/api/apiusers``` | Users |
| *GET* | ```http://localhost:5000/api/users/{id}/apimessahes``` | Messages |
| *GET* | ```http://localhost:5000/api/users/apidepartments``` | Department |
| *GET* | ```http://localhost:5000/api/apicompanies``` | Companies |
| *GET* | ```http://localhost:5000/api/companies/apidefaulters``` | Defaulter Companies |
### View One

| **Request** | **Route** | **Category**   |
| ----------- | --------- | -------------- |
| *GET*    | ```http://[THE LINKS ON [Getting All]]/1``` | One Item |

NB: *1* in the route above can be any number of choice

### Create Item

| **Request** | **Route** | **Category**   |
| ----------- | --------- | -------------- |
| *POST*    | ```http://[THE LINKS ON [Getting All]]``` | Add Item |

NB: You can  test this with Postman for all routes put there, make sure you made the [Configuration](#configuration) correctly.. This route needs authentication with token.

### Edit Item

| **Request** | **Route** | **Category**   |
| ----------- | --------- | -------------- |
| *PUT*    | ```http://[THE LINKS [Getting All]]/1``` | Edit Item |

NB: *1* in the route above can be any number of choice, make sure you made the [Configuration](#configuration). This route needs authentication.

### Deleting Item

| **Request** | **Route** | **Category**   |
| ----------- | --------- | -------------- |
| *DELETE*    | ```http://[THE LINKS [Getting All]]/1``` | Delete Item |

NB: *1* in the route above can be any number of choice, make sure you made the [Configuration](#configuration). This route needs authentication.

## Platforms

This project is designed to be a web application that is sstaged into the following:

1. The Web Portal

In this case, the application is used by the administration of the company to upload content and distribute it to the respective offices and environments of prompt. 
In this case, it is the API for certain functionality like the attached mobile application o other systems in demand.

2. The Enterprise Resource Planning (ERP)

This other section gives room for all other administration users to have accounts, have content shared from user to user and into the system as well as the respective individuals affilited with companies to register and follow up, section to section, and above it all, the user rights and privileges at different stages. 

The ERP handles confidentiality of all resources, content and usage of the system. That is why different privileges are given like, Administrator, User, Guest among others.

This Application is platform indipendent and thus can operate well on any device, work with different other programming languages.

## License & Copyright

The URSB Lite Web Application is under the MIT License and still under testing and developement but strictly a property of a few individuals referenced by [Bruno Nicholas](#developement).

## Development

```This application is at the current version, v0.1 as it is proudly developed by Bruno Nicholas```

*[Gmail](mailto:sbnibro256@gmail.com)*, *[Outlook](mailto:bruno.nicholas@outlook.com)*, *[Facebook](https://facebook.com/bruno.nicholas1)*, *[Twitter](https://twitter.com/Brunonicholas2)*, *[LinkedIn](https://www.linkedin.com/in/bruno-nicholas-9454b3108/)*
