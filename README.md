# ⚡️Rzl Laravel Toaster Message 🚀

```
    __        __              _                  _______
    \ \      / /__  _ __ ___  | |_ ___  ___ ___  \      \   ___ ___  ___
     \ \ /\ / / _ \| '__/ _ \ | __/ _ \/ __/ __| /   |   \ / __/ _ \/ __|
      \ V  V / (_) | | |  __/ | ||  __/\__ \__ \ /    |    \ (_|  __/\__ \
       \_/\_/ \___/|_|  \___|  \__\___||___/___/ \____|__  /\___\___||___/
                                                        \/          \/
                      🚀 Rzl App Laravel Toaster 🚀

```

> A clean, powerful Laravel Session Flash & Props Toaster helper —  
> perfect for Blade, Vue, React, Inertia, Livewire, or plain API.  
> **Built with ❤️ by [@rzl-app](https://github.com/rzl-app).**

[![Latest Version](https://img.shields.io/packagist/v/rzl-app/laravel-toaster?style=flat-rounded&color=green)](https://packagist.org/packages/rzl-app/laravel-toaster)
[![Downloads](https://img.shields.io/packagist/dt/rzl-app/laravel-toaster?style=flat-rounded&color=blue)](https://packagist.org/packages/rzl-app/laravel-toaster)
[![PHPStan](https://img.shields.io/badge/phpstan-level%208-brightgreen?style=flat-rounded)](https://phpstan.org)
[![PHP](https://img.shields.io/badge/PHP-^8.1-blue?style=flat-rounded)](https://www.php.net)
[![Laravel](https://img.shields.io/badge/Laravel-^9.x%20|%20^10.x%20|%20^11.x-red?style=flat-rounded)](https://laravel.com)
[![Illuminate Support](https://img.shields.io/badge/illuminate%2Fsupport-^9.x%20|%20^10.x%20|%20^11.x-blue?style=flat-rounded)](https://packagist.org/packages/illuminate/support)
[![Coverage](https://img.shields.io/codecov/c/github/rzl-app/laravel-toaster?style=flat-rounded)](https://codecov.io/gh/rzl-app/laravel-toaster)

---

## 📚 Table of Contents

- 🚀 [Requirements](#requirements)
- ⚙️ [Installation](#installation)
- 🔥 [Usage](#usage)
- 🖥 [Blade Example](#blade-example)
- 📝 [JSON Output](#json-output)
- 💡 [Tips & Best Practice](#tips--best-practice)
- ❤️ [Sponsor](#sponsor-this-package)
- 📜 [Changelog](#changelog)
- 🤝 [Contributing](#contributing)
- 🛡 [Security](#security)
- 🙌 [Credits](#credits)
- 📄 [License](#license)

---

<h2 id="requirements">🛠 Requirements</h2>

| Laravel Framework & `illuminate/support` | PHP  | Package Version |
| ---------------------------------------- | ---- | --------------- |
| ^9.x \| ^10.x \| ^11.x                   | ^8.1 | v1.0.x          |

---

<h2 id="installation">⚙️ Installation</h2>

```bash
composer require rzl-app/laravel-toaster
```

### Publish config

```bash
php artisan vendor:publish --tag="RzlLaravelToaster"
```

Will create `config/rzl-laravel-toaster.php`:

```php
return [
  /*
  |--------------------------------------------------------------------------
  | Session Flash Name for Toaster
  |--------------------------------------------------------------------------
  |
  | This defines the session key name used to flash the toaster data.
  | It will be retrieved on the frontend after a redirect or page reload.
  |
  | Note: The Value must be string and not empty or only space or as blank
  |       value, if invalid value will return fallback as "toast".
  |
  | Default: 'toast'
  |
  | Example:
  | session()->flash('toast', [...]);
  |
  */
  'session_name'  => "toast",

  /*
  |--------------------------------------------------------------------------
  | Settings Toaster Options As Session Flash or Only Return As Props Array.
  |--------------------------------------------------------------------------
  |
  | Toaster Mode: Flash Session or Return as Props Array
  | Return Format:
  |
  |  * false: `Session` -> `session()->flash("toast", [
  |               $title, $message, $type, $durationClose
  |           ]);`
  |
  |  * true: Props json output or array.
  |
  */
  'as_prop'       => false,
];
```

---

<h2 id="usage">🚀 Usage</h2>

### ✅ Basic flash

```php
toaster('Profile saved!');
```

### 🚀 With type & timeout

```php
toaster('Unauthorized action!', 'error', 5000);
toaster('Heads up!', 'warning', 0); // No auto close
```

### 🪄 Shortcuts

```php
toasterSuccess('Data saved!');
toasterError('Something wrong...');
toasterInfo('Heads up!');
toasterWarning('Careful!');
```

### 🔥 Props for API / SPA

```php
return [
    'toast' => toasterAsProps('Welcome back!', 'info')
];
```

or shortcuts:

```php
return response()->json([
    'toast' => toasterErrorAsProps('Invalid data!')
]);
```

---

<h2 id="blade-example">🖥 Blade Example</h2>

```blade
@if(session('toast'))
  <script>
    window.toast = @json(session('toast'));
    console.log('Toast:', window.toast);
  </script>
@endif
```

---

<h2 id="json-output">🚀 JSON output</h2>

```json
{
  "title": "success_1725459999",
  "message": "Profile updated",
  "type": "success",
  "durationClose": 2000,
  "timeGenerate": 1725459999
}
```

---

<h2 id="tips--best-practice">💡 Tips & Best Practice</h2>

✅ Use `session` for simple Laravel + Blade / Livewire.  
✅ Use `props` for Inertia, SPA, or pure API.  
✅ Set `as_prop` true in config to force always JSON array.

---

<h2 id="sponsor-this-package">❤️ Sponsor this package</h2>

Help support development:

[👉 Become a sponsor](https://github.com/sponsors/rzl-app)

---

<h2 id="changelog">📝 Changelog</h2>

See [CHANGELOG](CHANGELOG.md).

---

<h2 id="contributing">🤝 Contributing</h2>

See [CONTRIBUTING](CONTRIBUTING.md).

---

<h2 id="security">🛡 Security</h2>

Please report issues to [rizalvindwiky@gmail.com](mailto:rizalvindwiky@gmail.com).

---

<h2 id="credits">🙌 Credits</h2>

- [Rzl App](https://github.com/rzl-app)
- [All Contributors](../../contributors)

---

<h2 id="license">📜 License</h2>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---

✅ **Enjoy using `rzl-app/laravel-toaster`?**  
Star this repo ⭐ and share it with other Laravel developers!

---
