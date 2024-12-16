<?php
/**
 * Configuration file for AkiraSteam Documentation.
 *
 * This file contains various configuration settings for the application.
 *
 * @return array Configuration settings
 *
 * @property string $repoUrl URL to the GitHub repository containing the documentation pages.
 * @property array $site Site settings.
 * @property string $site['name'] Name of the documentation site.
 * @property string $site['url'] URL of the documentation site.
 * @property string $site['contact_email'] Contact email address for the site.
 *
 * Example usage:
 * 
 * ```php
 * $config = include 'config.php';
 * echo $config['site']['name']; // Outputs the name of the documentation site
 * ```
 */

return [
    'repoUrl' => 'https://api.github.com/repos/YOUR_GITHUB_NAME/REPO_NAME',
    'site' => [
        'name' => 'YOUR_WEBSITE_NAME',
        'url' => 'YOUR_WEBSITE_URL',
        'contact_email' => 'YOUR_CONTACT_EMAIL',
    ],
    'links' => [
        'github' => 'https://github.com/GITHUB_NAME',
        'twitter' => 'https://twitter.com/TWITTER_NAME',
        'instagram' => 'https://www.instagram.com/INSTAGRAM_NAME/',
    ],
];
?>
