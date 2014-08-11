<?

/*
 * © Oleg V. Krasnov / oleg.v.krasnov@gmail.com / skype: oleg.v.krasnov
 * Created: 25 july 2014
 * Version: 1.1
 */



class CDeclensionWords
{

  private static $count;
  private static $Nominative_singular;
  private static $Genitive_singular;
  private static $Genitive_plural;
  private static $declension_word;



  // Количество, Именительный падеж, Родительный падеж единственного числа, Родительный падеж множественного числа
  public static function setData($count, $Nominative_singular, $Genitive_singular, $Genitive_plural)
  {
    if (is_numeric($count))
    {
      self::$count = $count;
      self::$Nominative_singular = $Nominative_singular;
      self::$Genitive_singular = $Genitive_singular;
      self::$Genitive_plural = $Genitive_plural;
      self::getData();
    }
    else
      exit(DATA_ERROR);

    return self::$declension_word;
  }
  
  private static function getData()
  {
    if (preg_match('/^(1|([0-9]+)1)$/', self::$count))
      $word = self::$Nominative_singular;
    if (preg_match('/^([0-9]+)?(2|3|4)$/', self::$count))
      $word = self::$Genitive_singular;
    if (preg_match('/^(11|12|13|14|15|16|17|18|19|([0-9]+)?(5|6|7|8|9|0))$/', self::$count))
      $word = self::$Genitive_plural;

    self::$declension_word = $word;
  }

}
