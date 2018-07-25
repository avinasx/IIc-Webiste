<?php
/**
* FormBuilder config class
* uses Singleton design pattern
* Implements ArrayAccess
*
* @version 1.1
* @author Jo Morg
*/
class fb_config implements ArrayAccess
{
  
  /**
  * @access private
  */
  private static $_data = array();
  
  /**
  * CMSMS own config
  * @access private
  */
  private static $_CMSMS_CFG = NULL;
   
  /**
  * The instance of the class
  * @access private
  */
  private static $_instance;
  
  /**
  * Private constructor to prevent it being created directly
  * @access private
  */
  private function __construct(){}
    
  /**
  * GetInstance method used to access the object
  * @access public
  * @return 
  */
  public static function GetInstance()
  {
    if( !isset(self::$_instance) )
    {
      self::$_instance = new self;
      self::$_CMSMS_CFG = \cmsms()->GetConfig();
      $rootdir = dirname(  dirname(  dirname( dirname(__FILE__) ) ) );
      $file = cms_join_path( dirname( dirname(__FILE__) ), 'includes', 'fb_cnf.inc' );
      
      if( file_exists($file) )
      {
        include($file);
        self::$_data = isset($fbcfg) ? $fbcfg : array(); 
      }
      
    }
    
    return self::$_instance;
  }
  
  /**
  * prevent cloning of the object: issues an E_USER_ERROR if this is attempted
  */
  public function __clone()
  {
    trigger_error( 'Cloning the Config is not permitted', E_USER_ERROR );
  }
  
  /**
  * Get a data by key
  *
  * @param string The key data to retrieve
  * @access public
  */
  public function &__get ($key) 
  {
    if(self::$_CMSMS_CFG->offsetExists($key)) return self::$_CMSMS_CFG[$key];
    return self::$_data[$key];
  }

  /**
  * Assigns a value to the specified data
  *
  * @param string The data key to assign the value to
  * @param mixed  The value to set
  * @access public
  */
  public function __set($key, $value) 
  {
    trigger_error( 'Read Only', E_USER_ERROR );
  }
  
  public function offsetExists($key) 
  {
    return ( isset(self::$_data[$key]) || self::$_CMSMS_CFG->offsetExists($key) );
  }

   public function offsetGet($key) 
   {
     if(self::$_CMSMS_CFG->offsetExists($key)) return self::$_CMSMS_CFG[$key];
     
      if(isset(self::$_data[$key])) 
      {
         return self::$_data[$key];
      }

      return null;
   }

   public function offsetSet($key, $value) 
   {
      trigger_error( 'Read Only', E_USER_ERROR );
   }

   public function offsetUnset($key) 
   {
      trigger_error( 'Read Only', E_USER_ERROR );
   }
   
   public static function get($key)
  {
    if(self::$_CMSMS_CFG->offsetExists($key)) return self::$_CMSMS_CFG[$key];
    
    if( self::exists($key) )
    {
      return self::$_data[$key];
    }
  }

  public static function set($key, $value)
  {
    trigger_error( 'Read Only', E_USER_ERROR );
  }

  public static function erase($key)
  {
    trigger_error( 'Read Only', E_USER_ERROR );
  }
}
?>
