# docs-publications

Welcome to the `docs-publications` documentation. This guide will explain how to set up and use the documentation system based on GitHub and PHP.

## Table of Contents

1. [Introduction](#introduction)
2. [Prerequisites](#prerequisites)
3. [Installation](#installation)
4. [Configuration](#configuration)
5. [Usage](#usage)
6. [File Structure](#file-structure)
7. [Customization](#customization)
8. [Troubleshooting](#troubleshooting)
9. [Contributing](#contributing)
10. [License](#license)

## Introduction

`docs-publications` is a simple and efficient documentation system that dynamically fetches and displays Markdown files from a GitHub repository. It uses PHP and the Parsedown library to convert Markdown to HTML.

## Prerequisites

Before you begin, make sure you have the following:

- A web server (Apache, Nginx, etc.)
- PHP 7.4 or higher
- Composer (to manage PHP dependencies)
- A GitHub account

## Installation

Follow these steps to install the documentation system:

1. Clone the GitHub repository:

    ```bash
    git clone https://github.com/akirasteam-com/docs-publications.git
    ```

2. Navigate to the project directory:

    ```bash
    cd docs-publications
    ```

3. Install PHP dependencies with Composer:

    ```bash
    composer install
    ```

4. Configure your web server to point to the `docs-publications` directory.

## Configuration

1. Create a configuration file `config.php` in the [`src`](src) directory:

    ```php
    // filepath: /C:/xampp/htdocs/docs-publications/src/config.php
    <?php
    return [
        'site' => [
            'name' => 'Docs.Publications',
            'url' => 'http://localhost/docs-publications',
            'contact_email' => 'contact@akirasteam.com'
        ],
        'repoUrl' => 'https://api.github.com/repos/akirasteam-com/docs-publications/contents/pages'
    ];
    ```

2. Ensure the `Parsedown.php` file is present in the [`src/libs`](src/libs) directory.

## Usage

1. Add Markdown (`.md`) files to the `pages` folder of your GitHub repository.

2. Access your documentation site via your web browser. For example:

    ```
    http://localhost/docs-publications
    ```

3. Use the sidebar menu to navigate between different documentation pages.

## File Structure

Here is the project file structure:
```
docs-publications/
├── index.php
├── src/
│ ├── config.php
│ ├── css/
│ │ └── global_style_v2.css
│ └── libs
│ | └── Parsedown.php
└── README.md
```

## Customization

You can customize the style and content of the documentation by modifying the following files:

- **CSS**: Edit the [global_style_v2.css](http://_vscodecontentref_/1) file to change the documentation style.
- **Configuration**: Edit the [`src/config.php`](src/config.php) file to change site settings.
- **Pages**: Add or modify Markdown files in the `pages` folder of your GitHub repository.

## Troubleshooting

### Common Issues

1. **404 Error**: Ensure your web server is correctly configured to point to the `docs-publications` directory.
2. **Dependency Issues**: Make sure you have run `composer install` to install PHP dependencies.

### Logs and Debugging

- Check your web server logs for error messages.
- Use PHP debugging tools to identify issues.

## Contributing

We welcome contributions from the community! To contribute:

1. Fork the repository.
2. Create a branch for your feature or bug fix.
3. Submit a pull request with a detailed description of your changes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

---

© 2023 AkirasTeam. All rights reserved.
