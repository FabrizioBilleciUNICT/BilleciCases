# BilleciCases
##### A Laravel app which allows customers to order flight-cases and at the administrator to read, update, delete and develop the orders.
---

##### [ADMIN: EDIT AN ORDER]
Administrators can change the state of the order: if it has been received, it is under construction, ready for delivery or delivered.
##### [ADMIN: DELETE AN ORDER]
Administrators can delete an order.
##### [ADMIN: DASHBOARD]
Dashboard shows current works, earning, new orders and some statics about price and orders' type, over the time, within a Lines' Chart.
##### [ADMIN: TEMPLATES & COMPONENTS]
Administrators can create or update templates and components for the customers' orders.

##### [Customers: DASHBOARD]
Displays the orders placed with their parameters, price and development status and create new order.
##### [Customers: CREATE AN ORDER]
Specifies the type of flight-cases required (for: pizza, piano, telescope, cables) in which there are default settings, or select the "Custom" type for customizable measurements and others.


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
2. Go to 'app/Http/Controllers/AdminController.php' to change admin's email
2. Go to 'app' directory with terminal
4. Run ```$ composer install``` and then ```$ composer update```
5. Copy/Paste '.env.example' file and rename it in '.env'. Then run ```$ php artisan key:gen```
3. Start Apache Server Service
4. From shell(1)  ```$ mongod --ipv6``` start mongo-service
5. From shell(2) ```$ php artisan serve``` serve application to localhost:8000

### License 
GNU General Public License v3.0
Permissions of this strong copyleft license are conditioned on making available complete source code of licensed works and modifications, which include larger works using a licensed work, under the same license. Copyright and license notices must be preserved. Contributors provide an express grant of patent rights.
