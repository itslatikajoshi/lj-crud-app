# Simple CRUD Application Setup Guide

![CRUD Application Screenshot](https://raw.githubusercontent.com/gauravrjoshi/php-crud-app/main/php-crud-app.png "CRUD App Interface")

Welcome to the setup guide for your Simple CRUD Application. This application allows you to create, read, update, and delete contacts in a database. Follow the steps below to get your application running on localhost.

## Step 1: Create Database

First, you need to create a database that the CRUD application will use to store contact information. 

1. Open your database management tool (such as phpMyAdmin).
2. Create a new database named `crud_app`.

## Step 2: Create Table

With the database created, you now need to create a table within `crud_app` to hold the contact information. 

Execute the following SQL query to create the `contacts` table:

```sql
CREATE TABLE contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP
);
```

## Step 3: Setup Application Folder
After setting up the database, you'll need to place your CRUD application within your server's document root directory.

Locate the htdocs folder in your XAMPP/WAMP/MAMP installation directory.
Copy the crud folder (which contains your application files) into htdocs.


## Step 4: Run Application
Now that everything is set up, you can run the application through your web browser.

Open your web browser.
Navigate to http://localhost/crud.
This URL directs you to the main page of your CRUD application, where you can start managing your contacts.



# Basic CRUD App in PHP

This is a basic CRUD (Create, Read, Update, Delete) application implemented in PHP. CRUD operations are fundamental to most web applications, allowing users to interact with data by creating, reading, updating, and deleting records.

## Features

- **Create**: Add new records to the database.
- **Read**: Retrieve records from the database.
- **Update**: Modify existing records in the database.
- **Delete**: Remove records from the database.

## Technologies Used

- **PHP**: Backend scripting language.
- **MySQL**: Relational database management system for storing data.
- **HTML/CSS**: Frontend for user interface and styling.

## Installation

1. Clone the repository:

```bash
git clone https://github.com/itslatikajoshi/lj-crud-app.git
