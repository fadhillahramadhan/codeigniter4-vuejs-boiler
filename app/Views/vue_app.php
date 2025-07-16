<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'CodeIgniter 4 + Vue 3' ?></title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <?php if (ENVIRONMENT === 'development'): ?>
        <!-- Development mode: Vite dev server -->
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/resources/js/main.js"></script>
    <?php else: ?>
        <!-- Production mode: Built assets -->
        <?php if (file_exists(FCPATH . 'dist/.vite/manifest.json')): ?>
            <?php
            $manifest = json_decode(file_get_contents(FCPATH . 'dist/.vite/manifest.json'), true);
            $mainJs = $manifest['resources/js/main.js']['file'] ?? 'assets/main.js';
            $mainCss = $manifest['resources/js/main.js']['css'][0] ?? null;
            ?>
            <?php if ($mainCss): ?>
                <link rel="stylesheet" href="/dist/<?= $mainCss ?>">
            <?php endif; ?>
            <script type="module" src="/dist/<?= $mainJs ?>"></script>
        <?php else: ?>
            <!-- Fallback if manifest doesn't exist -->
            <script type="module" src="/dist/assets/main.js"></script>
        <?php endif; ?>
    <?php endif; ?>
</head>

<body>
    <!-- Vue 3 Application Mount Point -->
    <div id="app">
        <!-- Loading spinner while Vue loads -->
        <div style="
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            font-family: Arial, sans-serif;
            color: #666;
        ">
            <div style="text-align: center;">
                <div style="
                    border: 4px solid #f3f3f3;
                    border-top: 4px solid #dd4814;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    animation: spin 2s linear infinite;
                    margin: 0 auto 20px;
                "></div>
                <p>Loading Vue Application...</p>
            </div>
        </div>
    </div>

    <style>
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</body>

</html>