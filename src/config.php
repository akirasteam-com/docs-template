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
    'repoUrl' => 'https://api.github.com/repos/akirasteam-com/docs.akirasteam.com/contents/pages',
    'site' => [
        'name' => 'YourSiteName',
        'url' => 'YourSiteURL',
        'contact_email' => 'YourContactEmail',
    ],
    'links' => [
        'github' => 'YourGitHubURL',
        'twitter' => 'YourTwitterURL',
        'instagram' => 'YourInstagramURL',
    ],
];
?>