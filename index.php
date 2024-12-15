<?php
require 'src/libs/Parsedown.php';

$config = include 'src/config.php';

$parsedown = new Parsedown();

$repoUrl = $config['repoUrl'];

$context = stream_context_create([
    'http' => [
        'header' => 'User-Agent: PHP'
    ]
]);

$response = file_get_contents($repoUrl, false, $context);
$files = json_decode($response, true);

$page = $_GET['page'] ?? null;
$fileContent = '';
$fileAuthor = 'Unknown';
$fileDate = 'Unknown';

if ($page) {
    foreach ($files as $file) {
        if (basename($file['name'], '.md') === $page) {
            $fileResponse = file_get_contents($file['download_url'], false, $context);
            $fileContent = $parsedown->text($fileResponse);

            // Extract author and date from the file content
            if (preg_match('/^Author:\s*(.+)$/m', $fileResponse, $matches)) {
                $fileAuthor = $matches[1];
            }

            if (preg_match('/^Date:\s*(.+)$/m', $fileResponse, $matches)) {
                $fileDate = date('F j, Y', strtotime($matches[1]));
            }
            break;
        }
    }
}

if (empty($fileContent)) {
    $defaultPageContent = file_get_contents('src/inc/default_page.md');
    $fileContent = $parsedown->text($defaultPageContent);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['site']['name']; ?></title>

    <meta name="description" content="A simple HTML/CSS Documentation Template">

    <meta name="author" content="AkirasTeam">
    <link rel="stylesheet" href="src/css/global_style_v2.css">

    <link rel="shortcut icon" href="https://akirasteam.com/assets/img/logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        #scrollToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #00d4ff;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
        }

        #scrollToTopBtn:hover {
            background-color: #35b6cf;
        }
    </style>
</head>
<body style="background-color:  #1e1e30;">
    <header class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="https://docs.akirasteam.com/" style="color: white;">Docs.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="https://akirasteam.com/#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $config['site']['update']; ?>">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="mailto:<?php echo $config['site']['contact_email']; ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container clear">
        <div class="sidebar">
            <h2>Documentation</h2>
            <ul>
                <?php foreach ($files as $file): ?>
                    <li><a href="?page=<?php echo basename($file['name'], '.md'); ?>"><?php echo ucfirst(basename($file['name'], '.md')); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="content">
            <?php if ($page && !empty($fileContent)): ?>
                <div class="file-meta">
                    <p><strong>Author:</strong> <?php echo $fileAuthor; ?></p>
                    <p><strong>Date:</strong> <?php echo $fileDate; ?></p>
                </div>
            <?php endif; ?>
            <?php echo $fileContent; ?>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2023 AkirasTeam. All rights reserved.</p>
            <p>Follow us on <a href="<?php echo $config['links']['twitter']; ?>">Twitter</a>, <a href="<?php echo $config['links']['instagram']; ?>">Instagram</a>, and <a href="<?php echo $config['links']['github']; ?>">Github</a>.</p>
        </div>
    </footer>

    <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">Top</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get the button
        var mybutton = document.getElementById("scrollToTopBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>