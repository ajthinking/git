# Git for Laravel

<!-- ## Installation

You can install the package via composer:

```bash
composer require ajthinking/git
``` -->

:warning: Under development

## Usage

```php
Git::clone('user/repo', '~/local-path');
Git::checkout('feature/branch-name')

// Make changes ...

Git::add();
Git::commit('Some changes');

// Make PR ...
```

### Todo
- [x] `git --version`
- [x] `git clone remote path`
- [ ] `git add .`
- [ ] `git commit -m 'Some message'`

### Not supported
- Windows
- Bare repos
- Reference repos

### Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jurisoo@hotmail.com instead of using the issue tracker.

## Credits

-   Much of the code borrowed from [kbjr/Git.php](https://github.com/kbjr/Git.php)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
