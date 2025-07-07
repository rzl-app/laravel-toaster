<?php

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
  'session_name'       => "toast",

  /*
  |--------------------------------------------------------------------------
  | Settings Toaster Options As Session Flash or Only Return As Props Array.
  |--------------------------------------------------------------------------
  |
  | Toaster Mode: Flash Session or Return as Props Array
  | Set this value to `false` will set the return as `Session` -> `session()->flash("toast", [$title, $message, $type, $durationClose]);` otherwise will return array of toast.
  |
	*/
  'as_prop'       => false,

];
