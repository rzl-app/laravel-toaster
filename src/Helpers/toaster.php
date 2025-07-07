<?php

if (!function_exists("toaster")) {
  /** * Helper Function Toast Generate Props Flash Session for Front End.
   *
   * @param string|null $message
   * * This message is value of toaster and will be shows at Frond-End, if is null it will be as instance `\RzlApp\LaravelToaster\Toaster::getFacadeRoot()`.
   *
   * @param "success"|"error"|"info"|"warning" $type
   * * If no set one of them props, it will auto replace to "success" as default.
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
   * @return \RzlApp\LaravelToaster\CoreToaster|void
   */
  function toaster($message = null, $type = "success", $durationClose = 2000, $title = null, $returnAsProps = null)
  {
    /** @var \RzlApp\LaravelToaster\CoreToaster $instance */
    $instance = \RzlApp\LaravelToaster\Toaster::getFacadeRoot();

    if ($message) {
      return $instance->generate($message, $type, $durationClose, $title, $returnAsProps);
    }

    return $instance;
  }
}

if (!function_exists("toasterSuccess")) {
  /** * Helper Function Toast Generate Type Success Props Flash Session for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  function toasterSuccess($message, $durationClose = 2000, $title = null, $returnAsProps = null)
  {
    return toaster($message, "success", $durationClose, $title, $returnAsProps);
  }
}

if (!function_exists("toasterError")) {
  /** * Helper Function Toast Generate Type Error Props Flash Session for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  function toasterError($message, $durationClose = 2000, $title = null, $returnAsProps = null)
  {
    return toaster($message, "error", $durationClose, $title, $returnAsProps);
  }
}

if (!function_exists("toasterInfo")) {
  /** * Helper Function Toast Generate Type Info Props Flash Session for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  function toasterInfo($message, $durationClose = 2000, $title = null, $returnAsProps = null)
  {
    return toaster($message, "info", $durationClose, $title, $returnAsProps);
  }
}

if (!function_exists("toasterWarning")) {
  /** * Helper Function Toast Generate Type Warning Props Flash Session for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   * @param bool|null $returnAsProps
   * * This returnAsProps will send to Frond-End as Identity Toaster Message, default value is depends of config file `rzl-laravel-toaster.as_prop` or will override if you passing at this props function, if your not set at config file or not set this props at function well we force value to `false`.
   * #### * Note: The valid value is boolean, if your value of config file `rzl-laravel-toaster.as_prop` or you passing at this props function is not boolean, will force to `false`.
   * 
   * @return void|array
   * * if !$returnAsProps, It will set `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
   */
  function toasterWarning($message, $durationClose = 2000, $title = null, $returnAsProps = null)
  {
    return toaster($message, "warning", $durationClose, $title, $returnAsProps);
  }
}

if (!function_exists("toasterAsProps")) {
  /** * Helper Function Toast Generate `Toaster` as props (Array) for Front End.
   *
   * @param string|null $message
   * * This message is value of toaster and will be shows at Frond-End, if is null it will be as instance `\RzlApp\LaravelToaster\Toaster::getFacadeRoot()`.
   *
   * @param "success"|"error"|"info"|"warning" $type
   * * If no set one of them props, it will auto replace to "success" as default.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string with timestamp.
   *
   * @return \RzlApp\LaravelToaster\CoreToaster|array{title:string, message:string, type:string, durationClose:int|false, timeGenerate:int|float|string}
   */
  function toasterAsProps($message = null, $type = "success", $durationClose = 2000, $title = null)
  {
    /** @var \RzlApp\LaravelToaster\CoreToaster $instance */
    $instance = \RzlApp\LaravelToaster\Toaster::getFacadeRoot();

    if ($message) {
      return $instance->generate($message, $type, $durationClose, $title, true);
    }

    return $instance;
  }
}

if (!function_exists("toasterSuccessAsProps")) {
  /** * Helper Function Toast Generate `Toaster` type `success` as props (Array) for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   */
  function toasterSuccessAsProps($message, $durationClose = 2000, $title = null)
  {
    return toasterAsProps($message, "success", $durationClose, $title);
  }
}

if (!function_exists("toasterErrorAsProps")) {
  /** * Helper Function Toast Generate `Toaster` type `error` as props (Array) for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   */
  function toasterErrorAsProps($message, $durationClose = 2000, $title = null)
  {
    return toasterAsProps($message, "error", $durationClose, $title);
  }
}

if (!function_exists("toasterInfoAsProps")) {
  /** * Helper Function Toast Generate `Toaster` type `info` as props (Array) for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   */
  function toasterInfoAsProps($message, $durationClose = 2000, $title = null)
  {
    return toasterAsProps($message, "info", $durationClose, $title);
  }
}

if (!function_exists("toasterWarningAsProps")) {
  /** * Helper Function Toast Generate `Toaster` type `warning` as props (Array) for Front End.
   *
   * @param string $message
   * * This message is value of toaster and will be shows at Frond-End.
   *
   * @param false|int $durationClose
   * * If you set (<= `0` | `false`) is same like always show toast on front-end (no time-out auto closing), `if value is not int|false`, it will `be set` to `2000` as `default`, `minimum` integer `duration` is `300` `less than 300 will be set` to `300` and `maximum` integer `duration` is `10000` `more than 10000 will be set` to `10000`.
   *
   * @param string|null $title
   * * This title will send to Frond-End as Identity Toaster Message, default unique string base on timestamp.
   *
   */
  function toasterWarningAsProps($message, $durationClose = 2000, $title = null)
  {
    return toasterAsProps($message, "warning", $durationClose, $title);
  }
}
