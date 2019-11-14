# BilleciCases
Customers can view their orders and their status (sent, read, building, ready) and make new orders by choosing the type of flightcase they want and some additional options. The administrator has some tools available to view new orders, customer statistics and the number of flight cases built. He can filter, modify and delete orders, update component prices and upload templates.
![Screenshot](/images/ss0.png)

### Features
- Administrators space for create/update components, have business statics, edit/delete orders, see new orders
- Flight-Case's 3D visualization 
- Real-Time **price** (re)calculation
- Create, Read, Update, Delete orders easily
- **Responsive** WebPages
- Secure user-space 

### Specs [Client-Side]
- HTML5/CSS3
- Bootstrap
- Typescript/Javascript
- jQuery
- Chart.js 
- Moment.js
- Sprite3D.js

### Specs [Server-Side]
- Laravel MVC
- PHP
- MongoDB NoSQL-Database (jenssegers/mongodb)

### Prerequisites
To run this project you need this packages installed: 
```sh
php, composer, npm, mongodb-org
```
### Installation
1. Download or clone this repository
2. Go to 'app' directory with terminal
3. Run ```$ composer install```
4. Copy/Paste '.env.example' file and rename it in '.env'. Then run ```$ php artisan key:gen```
5. Start Apache Server Service
6. From shell(1)  ```$ mongod --ipv6``` start mongo-service
7. From shell(2) ```$ php artisan serve``` serve application to localhost:8000

### Access credentials
To run BilleciCases as administrator:
1. Register as a new user from 'localhost:8000/register'
2. Go to 'app/Http/Controllers/AdminController.php@isAdmin()' and change admin's email with yours.


### License 
GNU General Public License v3.0
Permissions of this strong copyleft license are conditioned on making available complete source code of licensed works and modifications, which include larger works using a licensed work, under the same license. Copyright and license notices must be preserved. Contributors provide an express grant of patent rights.

### Author
BilleciCases has been developed by Fabrizio Billeci. Computer Science student at University of Catania, Italy. 

##### Contacts
- Email: fabriziobilleci3@gmail.com
- LinkedIn: https://www.linkedin.com/in/fabrizio-billeci-7a7494100/

