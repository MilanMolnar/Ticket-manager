| PHP Build | Laravel Build |
|-----------|---------------|
| ![PHP Composer](https://github.com/MilanMolnar/Ticket-manager/workflows/PHP%20Composer/badge.svg) | ![Laravel](https://github.com/MilanMolnar/Ticket-manager/workflows/Laravel/badge.svg) |

# Ticket Manager
Ticket Manager is a easy to use ticket submission and control app.

  - Easy to understand UI.
  - Admin page.
  - Filtering submissions.

# Installation!

> Clone the repository and follow the steps.

Set up your .env file to your desired database!
```sh
cd master
composer install
php artisan migrate
php artisan make:admin
```
Note: You can check the artisan command list and its description with the command:
```sh
php artisan
```

### Tech

Used technologies for this project:

* [Laravel] - Best framework for creating awesome apps fast.
* [PHP] - for the best web apps!
* [PHP Storm] - Awesome php text editor by jetbrains.
* [MySQL] - Oracles awesome database.
* [jQuery] - For Ajax request.
* [Bootstrap] - UI design.
* [Github] - duh.

# Usage
Run the command (default port: '8000')
```sh
php artisan serve
```

### - Customer:
- Write a ticket on **'/ '** using your E-mail and Name, Note your E-mail will be binded to your Name.
- Check the due date on **'/success'**, and navigate back to write an other ticket.
### - Admin:
- Login to your custom created master user account on **'/login'**.
- Check the tickets on **'/admin/ticketlist'**
- You can filter to **customer** aswell as **Due date** and **Submission Date**.


License
----
Free to use, free to modify, free to share.

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [MySQL]: <https://www.mysql.com/>
   [Github]: <https://github.com/>
   [Bootstrap]: <https://getbootstrap.com/>
   [jQuery]: <http://jquery.com>
   [Laravel]: <https://laravel.com/>
   [Php]: <https://www.php.net/>
   [PHP storm]: <https://www.jetbrains.com/phpstorm/>
