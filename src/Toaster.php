<?php

namespace RzlApp\LaravelToaster;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void generate(string $title, string $message, string $type = "success", int|false $durationClose = 2000)
 * @method static void success(string $message, int|false $durationClose = 2000,string|null $title = null)
 * @method static void error(string $message, int|false $durationClose = 2000,string|null $title = null)
 * @method static void info(string $message, int|false $durationClose = 2000,string|null $title = null)
 * @method static void warning(string $message, int|false $durationClose = 2000,string|null $title = null)
 *
 * @see \RzlApp\LaravelToaster\CoreToaster
 */
class Toaster extends Facade
{

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor(): string
  {
    return CoreToaster::class;
  }
}
