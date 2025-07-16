# CodeIgniter 4 + Vue 3 Integration

This project integrates Vue.js 3 with CodeIgniter 4 using Vite as the build tool.

**Author:** Fadhillah Ramadham

## Getting Started

### Prerequisites

-   PHP 8.1 or higher
-   Node.js 16.0 or higher
-   npm or yarn

### Installation

1. **Install PHP dependencies:**

    ```bash
    composer install
    ```

2. **Install Node.js dependencies:**

    ```bash
    npm install
    ```

3. **Copy environment file:**
    ```bash
    cp env .env
    ```

### Development

#### Start the development servers:

1. **Start Vite development server (for Vue.js hot reloading):**

    ```bash
    npm run dev
    ```

2. **Start CodeIgniter development server (in a separate terminal):**

    ```bash
    php spark serve
    ```

3. **Open your browser:**
   Navigate to `http://localhost:8080`

The Vue application will be served with hot module replacement (HMR) for fast development.

### Production Build

1. **Build the Vue application for production:**

    ```bash
    npm run build
    ```

2. **Set environment to production:**
   In your `.env` file, set:
    ```
    CI_ENVIRONMENT = production
    ```

The built files will be placed in `public/dist/` and will be automatically served in production mode.

## Project Structure

```
├── app/
│   ├── Controllers/
│   │   └── Home.php          # Updated to serve Vue app
│   └── Views/
│       └── vue_app.php       # Main template that loads Vue
├── resources/
│   └── js/
│       ├── main.js           # Vue application entry point
│       ├── App.vue           # Main Vue component
│       └── components/       # Vue components
│           ├── Header.vue
│           ├── Welcome.vue
│           └── Footer.vue
├── public/
│   └── dist/                 # Built assets (generated)
├── package.json              # Node.js dependencies
└── vite.config.js           # Vite configuration
```

## Features

-   ✅ Vue 3 with Composition API
-   ✅ Vite for fast development and optimal builds
-   ✅ Hot Module Replacement (HMR)
-   ✅ Automatic production/development mode switching
-   ✅ CodeIgniter 4 integration
-   ✅ Component-based architecture
-   ✅ Responsive design

## Adding New Vue Components

1. Create your component in `resources/js/components/`
2. Import and use it in your parent components
3. The Vite dev server will automatically reload with your changes

## API Integration

To make API calls from Vue to CodeIgniter:

1. Create API controllers in `app/Controllers/`
2. Define routes in `app/Config/Routes.php`
3. Use fetch or axios in your Vue components to call the APIs

Example API controller:

```php
<?php
namespace App\Controllers;

class Api extends BaseController
{
    public function users()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'data' => ['user1', 'user2']
        ]);
    }
}
```

Example Vue API call:

```javascript
// In your Vue component
async function fetchUsers() {
	const response = await fetch('/api/users');
	const data = await response.json();
	return data;
}
```

## Troubleshooting

### Vue app doesn't load

-   Make sure both Vite dev server (`npm run dev`) and CodeIgniter server (`php spark serve`) are running
-   Check that Vite is running on port 5173 (default)

### Production build issues

-   Run `npm run build` to generate production assets
-   Make sure your web server can serve files from `public/dist/`

### CORS issues during development

-   The template automatically handles development/production modes
-   Ensure your CodeIgniter base URL is configured correctly

## Commands Reference

```bash
# Development
npm run dev              # Start Vite dev server
php spark serve          # Start CodeIgniter server

# Production
npm run build            # Build for production
npm run preview          # Preview production build

# Package management
npm install              # Install dependencies
composer install        # Install PHP dependencies
```
