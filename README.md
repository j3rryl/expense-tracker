# Expense Tracker

This is a simple expense tracker made in Codeigniter HMVC

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Running the Project](#running-the-project)
- [Building for Production](#building-for-production)
- [Database Setup and Management](#database-setup-and-management)
- [Technologies Used](#technologies-used)
- [License](#license)

## Introduction

This is a simple expense tracker application made in Codeigniter HMVC

## Features

- Easy management of content
- Interactive UI built with Codeigniter
- Easy setup and customization

## Installation

To get started with the project, follow these steps to set it up locally:

1. **Clone the repository:**

   ```bash
   https://github.com/j3rryl/expense-tracker.git
   cd expense-tracker
   ```

2. **Install the required composer packages:**

   ```bash
   composer install
   ```

## Running the Project

To run the project in development mode:

1. **Start the codeigniter server:**

```bash
php spark serve
```

# Database Setup and Management

This project utilizes [Codeigniter Query Builder](https://codeigniter.com/user_guide/database/query_builder.html) as an ORM for database management. Follow the instructions below to set up, migrate, and seed the database.

1. **Prerequisites:**
   Ensure you have the necessary environment variables configured for database access.

   ```bash
   cp .env.example .env
   ```

2. **Running the migrations:**
   To apply all pending migrations and set up the initial database schema, run:

   ```bash
   php spark migrate
   ```

3. **Seeding the database:**
   To populate the database with seed data, use:

   ```bash
   php spark db:seed DatabaseSeeder
   ```

## Technologies Used

- [Codeigniter](https://codeigniter.com/)
- [Bootstrap-5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)

## License

Distributed under the MIT License. See `LICENSE` for more information.
