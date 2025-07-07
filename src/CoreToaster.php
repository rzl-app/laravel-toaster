<?php

namespace RzlApp\LaravelToaster;

use Carbon\Carbon;

final class CoreToaster
{
  /** * Helper Function Toast Generate Props Or Flash Session for Front End.
   *
   * @param string $message
   * * This message is value body of toaster and will be shows at Frond-End.
   *
   * @param "success"|"error"|"info"|"warning" $type
   * * If no set one of them props, it will auto replace to "success".
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string with timestamp.
   * 
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   *
   * @return void|array{title: string, message: string, type: string, durationClose: int|false, timeGenerate: int|float|string}
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  public function generate($message, $type = "success", $durationClose = 2000, $title = null, $returnAsProps = null)
  {
    if (!in_array($type, ["success", "error", "info", "warning"])) {
      if (app()->isLocal()) {
        $ControllerName = request()->route()->getActionName();

        $message = "'$type' is not allowed for type ['success', 'error', 'info', 'warning'], at: " . $ControllerName;

        $durationClose = false;

        $type = "error";
      } else {
        $type = "success";
      }
    }

    if ((gettype($durationClose) === "boolean" && $durationClose == false) || gettype($durationClose) === "integer") {
      if ($durationClose == false || $durationClose <= 0) {
        $durationClose = false;
      }
      if (gettype($durationClose) === "integer") {
        $durationClose = $durationClose >= 10_000 ? 10_000 : ($durationClose <= 300 ? 300 : $durationClose);
      }
    } else {
      $durationClose = 2000;
    }

    $uniqueTime = Carbon::now()->timestamp;

    $toast = [
      "title"          => $title ?? $type . "_" . $uniqueTime,
      "message"        => $message ?? "",
      "type"           => $type,
      "durationClose"  => $durationClose,
      "timeGenerate"   => $uniqueTime
    ];

    $returnAsProps = is_bool($returnAsProps)
      ? $returnAsProps
      : (is_bool($cfg = config("rzl-laravel-toaster.as_prop")) ? $cfg : false);


    if ($returnAsProps) {
      return $toast;
    }

    /** @var string $sessionFlashName */
    $sessionFlashName = (is_string($s = config("rzl-laravel-toaster.session_name")) && trim($s) !== '') ? trim($s) : "toast";

    session()->flash($sessionFlashName, $toast);
  }

  /** * Helper Function Toast Generate Type Success as Flash Session or Props Array for Front End.
   *
   * @param string $message
   * * This message is value body of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string with timestamp.
   * 
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  public function success($message, $durationClose = 2000, $title = null, $returnAsProps = null): void
  {
    $this->generate($message, "success", $durationClose, $title, $returnAsProps);
  }

  /** * Helper Function Toast Generate Type Error as Flash Session or Props Array for Front End.
   *
   * @param string $message
   * * This message is value body of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string with timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  public function error($message, $durationClose = 2000, $title = null, $returnAsProps = null): void
  {
    $this->generate($message, "error", $durationClose, $title, $returnAsProps);
  }

  /** * Helper Function Toast Generate Type Info as Flash Session or Props Array for Front End.
   *
   * @param string $message
   * * This message is value body of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string with timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  public function info($message, $durationClose = 2000, $title = null, $returnAsProps = null): void
  {
    $this->generate($message, "info", $durationClose, $title, $returnAsProps);
  }

  /** * Helper Function Toast Generate Type Warning as Flash Session or Props Array for Front End.
   *
   * @param string $message
   * * This message is value body of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string with timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  public function warning($message, $durationClose = 2000, $title = null, $returnAsProps = null): void
  {
    $this->generate($message, "warning", $durationClose, $title, $returnAsProps);
  }
}
