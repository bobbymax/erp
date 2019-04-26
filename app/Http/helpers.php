<?php

/**
 * [slugify description]
 * 
 * @param  [type] $text [description]
 * 
 * @return [type]       [description]
 */
function slugify($text) {

  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function ticketcode($directorate_abv, $department_abv)
{
  return $directorate_abv . "/" . $department_abv . "/" . getToken(5) . "/" . date('Y');
}

/**
 * Elegant flash messaging
 * 
 * @param  [type] $title   [description]
 * @param  [type] $message [description]
 * 
 * @return [type]          [description]
 * 
 */
function flash($title = null, $message = null) {

  $flash = app('App\Http\Flash');

  if (func_num_args() == 0) {
    return $flash;
  }

  return $flash->info($title, $message);

}

/**
 * Return Excerpt
 * 
 * @param  [type] $string [description]
 * @param  [type] $count  [description]
 * 
 * @return [type]         [description]
 * 
 */
function excerpt($string, $count) {

  $words = explode(' ', $string);

  if (count($words) > $count) {
    $words = array_slice($words, 0, $count);
    $string = implode(' ', $words);
  }

  return $string;
  
}

/**
 * Generate random string for Project Code
 * 
 * @param  [type] $length [description]
 * @return [type]         [description]
 * 
 */
function generateString($length) 
{
    $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

/**
 * Formats numbers to thousands, millions and billions
 * 
 * @param $value Currency
 * 
 */

function FormatLongNumber($value) {
  if($value == 0) {
    return 0;
  } else {
      // hundreds
      if($value <= 999){
        return $value;
      }
      // thousands
      else if($value >= 1000 && $value <= 999999){
        return ($value / 1000) . 'K';
      }
      // millions
      else if($value >= 1000000 && $value <= 999999999){
        return ($value / 1000000) . 'M';
      }
      // billions
      else if($value >= 1000000000 && $value <= 999999999999){
        return ($value / 1000000000) . 'B';
      }
      else
        return $value;
  }
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}