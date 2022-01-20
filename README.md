# node-debugg-server

## USAGE

* _To install use `npm install`_
* _To run use `npm run start`_

## PHP FUNCTION

```php
/**
 * @param mixed $data 
 * @return void 
 */
function remote_console_log($data){
    $url = "http://localhost:5000/debugg";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "data = ".var_export($data, true) );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($curl);
}
```
