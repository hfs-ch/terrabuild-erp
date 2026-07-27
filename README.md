# 🏗️ TerraBuild ERP

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![AdminLTE](https://img.shields.io/badge/AdminLTE-3-3C8DBC?style=for-the-badge)

**Modern ERP Platform for Construction & Civil Engineering Companies**

Manage projects, construction sites, employees, inventory, suppliers, quotations, invoices and more in one centralized application.

</div>

---

# 📋 Overview

TerraBuild ERP is a comprehensive Enterprise Resource Planning (ERP) platform specifically designed for construction and civil engineering companies.

The application centralizes operational workflows into a single management system, enabling companies to efficiently organize projects, monitor construction sites, manage employees, supervise inventory, and streamline financial operations.

Built with Laravel and MySQL, TerraBuild focuses on performance, scalability, security, and ease of use.

---

# ✨ Key Features

## 📊 Dashboard

- Business overview
- Project statistics
- Operational KPIs
- Recent activities

---

## 🏗️ Project Management

- Create and manage projects
- Track project lifecycle
- Budget monitoring
- Project status management

---

## 🚧 Construction Site Management

- Site registration
- Progress monitoring
- Budget allocation
- Schedule management

---

## 👥 Employee Management

- Employee profiles
- Contact information
- Position management
- Team assignment

---

## 👨‍👩‍👧 Team Management

- Create teams
- Assign employees
- Team organization

---

## 👤 Client Management

- Customer database
- Contact management
- Project association

---

## 🚚 Supplier Management

- Supplier directory
- Contact information
- Supplier specialization

---

## 📦 Materials & Inventory

- Material catalog
- Quantity management
- Unit pricing
- Stock movement tracking

---

## 🚛 Vehicle Management

- Vehicle registry
- Driver assignment
- Construction site allocation
- Status monitoring

---

## 💰 Financial Management

- Quotations (Devis)
- Invoice management
- Payment tracking

---

# 🛠️ Technology Stack

| Backend | Frontend | Database | Infrastructure |
|---------|----------|-----------|----------------|
| Laravel 13 | Bootstrap 5 | MySQL 8 | Docker |
| PHP 8.4 | AdminLTE | Eloquent ORM | Linux |

---

# 📁 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

# 🚀 Installation

Clone the repository

```bash
git clone https://github.com/hfs-ch/terrabuild-erp.git
```

Navigate to the project

```bash
cd terrabuild-erp
```

Install dependencies

```bash
composer install
```

Create environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure the database inside `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=terrabuild
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run migrations

```bash
php artisan migrate
```

Launch the development server

```bash
php artisan serve
```

---

# 📌 Core Modules

- Dashboard
- Projects
- Construction Sites
- Employees
- Teams
- Clients
- Suppliers
- Materials
- Inventory
- Vehicles
- Quotations
- Invoices
- Payments

---

# 🎯 Objectives

- Improve construction workflow efficiency
- Centralize company data
- Simplify project supervision
- Reduce manual administrative tasks
- Improve resource management

---

# 🔒 Security

- Authentication
- Role-based authorization
- Form validation
- CSRF protection
- SQL Injection protection
- Secure password hashing

---

# 📈 Future Enhancements

- PDF generation
- Advanced reporting
- Dashboard analytics
- Email notifications
- Calendar integration
- REST API
- Mobile application
- Multi-language support
- File management
- Backup & Restore

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a feature branch

```bash
git checkout -b feature/new-feature
```

3. Commit your changes

```bash
git commit -m "Add new feature"
```

4. Push your branch

```bash
git push origin feature/new-feature
```

5. Open a Pull Request

---

# 📄 License

This project is distributed under the MIT License.

---

<div align="center">

**TerraBuild ERP**

Building Better Construction Management Solutions 🚧

</div>
