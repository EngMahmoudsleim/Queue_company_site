# Queue Company Site (Laravel)

Production-minded starter for a software company website with:
- Public marketing pages
- Dynamic project showcase and project details
- Demo login directory
- Contact form with persistence
- Admin-auth-protected CRUD for projects
- Seeded realistic projects and admin user

## Setup
1. `composer install`
2. `cp .env.example .env`
3. Configure MySQL credentials in `.env`
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `php artisan serve`

## Admin demo credentials
- Email: `admin@queue-company.test`
- Password: `Admin@123456`

## Main routes
- `/`
- `/about`
- `/services`
- `/projects`
- `/projects/{slug}`
- `/demo-login`
- `/contact`
- `/login`
- `/admin/dashboard`
