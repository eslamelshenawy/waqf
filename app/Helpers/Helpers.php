<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
const AUTHOR = 'Magdy Ismail';
const LETTERS = ['y'];
const WORDS = ['tea', 'detail'];
define('COMPLEX_PASSWORD', date('d-m-Y'));


function decode_set($set){
    return explode(',', $set);
}

function adminUrl () {
    return asset('admin');
}

function getModelId($model, $columnName, $columnValue, $isModule = false, $moduleName = null): int
{
    if($isModule == true){
        $modelsPath = 'Modules\\' . $moduleName .'\\Entities\\';
    }else{
        $modelsPath = '\\App\\';
    }

    $$model = $modelsPath . $model;

    return $$model::where($columnName, '=', $columnValue)->pluck('id')->first() ?? 0;
}

function getCityById(int $id)
{
    return App\City::find($id);
}

function plural($model)
{

    $model = trim($model);

    if($model == null || $model == ''){
        return $model;
    }

    if(in_array( $model, WORDS )){
        return $model;
    }

    if( in_array($model[-1],  LETTERS) ){
        foreach(LETTERS as $letter){
            $model = str_replace($letter, 'ies', $model);
        }
    }elseif( in_array($model[-1], ['s']) ){
        return $model;
    }
    else{
        $model = $model . 's';
    }

    return $model;
}

function getModels($except = array())
{
    $models = [];
    $blacklist = [];
    $whitelist = [];

    if(( Storage::exists('container/blacklist.json'))){
        try{
            $blacklist = json_decode(Storage::get('container/blacklist.json'), JSON_PRETTY_PRINT);
        }catch (\Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException $ex){
            \Illuminate\Support\Facades\Log::error($ex);
        }
    }

    if(( Storage::exists('container/whitelist.json'))){
        try{
            $whitelist = json_decode(Storage::get('container/whitelist.json'), JSON_PRETTY_PRINT);
        }catch (\Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException $ex){
            \Illuminate\Support\Facades\Log::error($ex);
        }
    }


    foreach(glob(app_path() . '/*.php') as $model){
        array_push($models, str_replace(app_path() . '/', '', $model));
    }

    $except = $blacklist;
    $append = $whitelist;

    if( is_array($except) && count($except) > 0 ){
        for($i=0; $i<count($except); $i++){
            if( in_array($except[$i], $models) ){
                $index = array_search($except[$i], $models);
                unset($models[$index]);
            }
        }
    }

    if( is_array($append) && count($append) > 0 ){
        for($i=0; $i<count($append); $i++){
            if( ! in_array($append[$i], $models) ){
                array_push($models, $append[$i]);
            }
        }
    }

    return $models;
}

function advanced_bread_crumb($current_page = null, $previous_page = null){
    if(url()->previous() != null)
        session()->put('previous_page', app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName()
    );
}

function bread_crumb_unlimited(array $paths = []){
    session()->put('paths', $paths);
}

function bread_crumb_3d($previous = null, $current = null)
{

    if( ! is_null($previous) ){
        session()->put('previous', [
            'name' => $previous['name'],
            'url' => $previous['url'],
        ]);
    }else{
        session()->remove('previous');
    }

    session()->put('current', [
        'name' => $current['name'],
        'url' => $current['url'],
    ]);
}

function bread_crumb($current_page = null)
{
    session()->put('current_page', ($current_page));
}

function __regex__()
{
    return 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/';
}

function checkbox($name, $len, $something)
{

    for($i=0; $i<$len; $i++){
        if(old($name . '.' . $i) == $something){
            return true;
        }
    }

    return false;

}

function en2ar($str)
{
    $western_arabic = ['0','1','2','3','4','5','6','7','8','9'];
    $eastern_arabic = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    return str_replace($western_arabic, $eastern_arabic, $str);
}

function utf8($str) {
//    $western_arabic = new SplFixedArray(10);
//    $eastern_arabic = new SplFixedArray(10);
    $western_arabic = ['0','1','2','3','4','5','6','7','8','9'];
    $eastern_arabic = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    return str_replace($eastern_arabic, $western_arabic, $str);
}

function slug_ar($str){
    $letters = explode(' ', $str);
    $newStr = [];
    foreach($letters as $key => $letter){
        if(trim($letter) == null || trim($letter)){
            continue;
        }
        array_push($newStr, $letter);
    }
    return $newStr;
}
function format_number($number)
{
    if (strlen($number) == 10 && Str::startsWith($number, '05'))
        return preg_replace('/^0/', '966', $number);
    elseif (Str::startsWith($number, '00'))
        return preg_replace('/^00/', '', $number);
    elseif (Str::startsWith($number, '+'))
        return preg_replace('/^+/', '', $number);
    return $number;
}
function format_numbers($numbers, $separator)
{
    if (!is_array($numbers))
        return format_number($numbers);
    $numbers_array = array();
    foreach ($numbers as $number) {
        $n = format_numbers($number);
        array_push($numbers_array, $n);
    }
    return implode($separator, $numbers_array);
}
if (!function_exists('sendSms')) {

    function sendSms($mobileno = null, $msgtext = null)
    {
        /*    if ($mobileno !== null && $msgtext !== null) {
                dd() ;
                $url = "https://mshastra.com/sendurl.aspx?user=20093627&pwd=igxz2P$&senderid=RYADYI&mobileno={$mobileno}&msgtext={$msgtext}&priority=High&CountryCode=ALL";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $curl_scraped_page = curl_exec($ch);
                curl_close($ch);
                dd(1) ;
            } else {
                echo false;
            }*/

        //
        if ($mobileno !== null && $msgtext !== null) {
            $url = "https://mshastra.com/sendurlcomma.aspx?user=20093627&pwd=igxz2P$&senderid=RYADYI&mobileno=".format_number($mobileno)."&msgtext={$msgtext}";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
            return true  ;
        }
        else{
            return false ;
        }
    }

}

