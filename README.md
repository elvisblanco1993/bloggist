# Welcome to the **Bloggist** installation guide.

Please read along to set up your own **Bloggist** instance.

## Before you start
There are some things you will need before you can get started developing with **Bloggist**.

- Apache/Nginx (This guide was built using Nginx on Ubuntu Server 22.04. You can also use [MAMP][mamp] or [XAMPP][xampp], which are available for both macOS and Windows)
- MySQL server (database server)
- [VS Code][vscode] (code editor)
- [Beekeeper Studio][beekeeper] (database management software)
- [Git][git] (version control management)
- [Composer][composer] (PHP package manager)
- [NPM][npm] (JS package manager)

[beekeeper]: https://www.beekeeperstudio.io/get
[vscode]: https://code.visualstudio.com/Download
[git]: https://git-scm.com/downloads
[composer]: https://getcomposer.org/download/
[npm]: https://nodejs.org/en/
[mamp]: https://www.mamp.info
[xampp]: https://www.apachefriends.org/

## Getting **Bloggist** up and running in your server

1. **Clone the repository into your development environment.**

    ```git clone https://github.com/elvisblanco1993/bloggist.git```

2. **Move into the project directory.**

    ```cd bloggist```

3. **Create the environment file.**

    ```cp .env.example .env``` for UNIX based systems, and ```copy .env.example .env``` on MS Windows

4. **Install back-end dependencies (this includes all packages Bloggist depends on).**

    ```composer install```

5. **Install front-end dependencies.**

    ```npm install```

6. **Generate application key (this will help with encryption and security).**

    ```php artisan key:generate```

7. **Create database.**

    1. Open a terminal window, and access your MySQL server

        ```sudo mysql -u root -p;```

    2. Create your database and assign permissions

        ```
        CREATE DATABASE bloggist;
        CREATE USER 'bloggist'@'localhost' IDENTIFIED BY '{YOUR_PASSWORD}';
        ALTER USER 'bloggist'@'localhost' IDENTIFIED WITH mysql_native_password BY '{YOUR_PASSWORD}';
        GRANT ALL PRIVILEGES ON bloggist.* to 'bloggist'@'localhost' WITH GRANT OPTION;
        FLUSH PRIVILEGES;
        EXIT;
        ```
        *Replace {YOUR_PASSWORD} with a strong, secure password.*

 8. **Add your database credentials to Bloggist.**

    Now that you created your database, database username and password, it is time to connect your instance to it.

    To do so, open your *.env* file, and modify the following lines.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bloggist
    DB_USERNAME=bloggist
    DB_PASSWORD=SET_YOUR_PASSWORD_HERE
    ```
9. **Run migrations (this will create your database tables).**

    ```php artisan migrate```
    
10. **Generate front-end assets.**

    Run ```npm run build``` if you are deploying on production, or ```npm run dev``` if you are deploying on a staging site want live reload

## You are all set!

Now your Bloggist site should be up and running.

#### What's next?

If you are deploying your site on a production environment, you will need to enable SSL certificates to ensure all traffic from and to your server is fully secure. You can follow [this guide][letsencryptguide] on how to get a free certificate from Let's Encrypt.

[letsencryptguide]: https://www.digitalocean.com/community/tutorials/how-to-secure-nginx-with-let-s-encrypt-on-ubuntu-22-04
