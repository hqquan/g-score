# G-Score Laravel

## 📋 Requirements

-   **PHP 8.2+**
-   **Composer** (PHP dependency manager)
-   **Database** - Works with SQLite (default), MySQL, or PostgreSQL

### Check Your Environment

Verify your installations:

```bash
php -v
composer -V
node -v
npm -v
```

## 🚀 Quick Start Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/hqquan/g-score.git
cd g-score
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

This command will install all Laravel dependencies defined in `composer.json`.

### Step 3: Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

**For Windows users:**

```bash
copy .env.example .env
```

**Or create it programmatically:**

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

This creates a unique encryption key for your application.

### Step 5: Configure Database

Update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=g-score
DB_USERNAME=root
DB_PASSWORD=
```

Create the database:

```bash
MySQL
mysql -u root -p -e "CREATE DATABASE g-score;"

PostgreSQL
createdb g-score
```

Run migrations:

```bash
php artisan migrate
```

### Step 6: Seed the Database

```bash
php artisan db:seed StudentSeeder
```

### Step 7: Run application

```bash
php artisan serve
```

**Access your application at:** [http://localhost:8000](http://localhost:8000)
