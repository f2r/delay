# delay
Delay some task at the end of script, after sending response to the client

Usage : 
```php
\f2r\FPM\Delay::register(function(){
       file_put_contents('/var/log/trace.log', time() ."\n", FILE_APPEND);
});
```
