<?php 
// require("SplEnum.php");

abstract class BasicEnum 												{	

    private static $constCacheArray = NULL;

    private static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value, $strict = true) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }
    
}

abstract class InsertTagEnum extends BasicEnum			{

    private static $type;

    const
        __default = 0,
        datetime = 1,
		datetimeLocal = 2,
		date = 3,
		month = 4, 
		week = 5,
		time = 6,
		number = 7,
		range = 8,
		email = 9,
		url = 10;

    public static function getTypeStr( $t )             {

        switch ( $t )   {
            case InsertTagEnum::datetime: 
                $type = "datetime"; 
            break;
            case InsertTagEnum::datetimeLocal: 
                $type = "datetime-local"; 
            break;
            case InsertTagEnum::date: 
                $type = "date";
            break;
            case InsertTagEnum::month:
                $type = "month";
            break;
            case InsertTagEnum::week: 
                $type = "week";
            break;
            case InsertTagEnum::time: 
                $type = "time";
            break;
            case InsertTagEnum::number: 
                $type = "number";
            break;
            case InsertTagEnum::range: 
                $type = "range";
            break;
            case InsertTagEnum::email: 
                $type = "email";
            break;
            case InsertTagEnum::url: 
                $type = "url";
            break;
        }     
    }

}


?>
