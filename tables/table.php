<?php
/**
 * @package     Windwalker.Framework
 * @subpackage  AKTable
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.database.tablenested');

/**
 * icon Table class
 */
class AKTable extends JTable
{
 
    /**
     * Method to return the title to use for the asset table.
     *
     * @return  string 
     *
     * @since   11.1
     */
    protected function _getAssetTitle()
    {
        if( property_exists($this , 'title') && $this->title)
            return $this->title ;
        else
            return $this->_getAssetName() ;
    }
    
    /**
     * Overloaded bind function to pre-process the params.
     *
     * @param    array        Named array
     * @return    null|string    null is operation was satisfactory, otherwise returns an error
     * @see        JTable:bind
     * @since    1.5
     */
    public function bind($array, $ignore = '')
    {
        // for Fields group
        // Convert jform[fields_group][field] to jform[field] or JTable cannot bind data.
        // ==========================================================================================
        $data = array() ;
        foreach( $array as $val ):
            if(is_array($val)) {
                foreach( $val as $key => $val2 ):
                    $array[$key] = $val2 ;
                endforeach;
            }
        endforeach;
        
        
        
        // Set field['param_xxx'] to params
        // ==========================================================================================
        if(empty($array['params'])){
            $array['params'] = (array)AKHelper::_('array.pivotFromPrefix', 'param_', $array, $array['params']) ;
        }
        
        
        
        // set params
        // ==========================================================================================
        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string)$registry;
        }
        
        
        
         // Bind the rules.
         // ==========================================================================================
        if (isset($array['rules']) && is_array($array['rules']))
        {
            $rules = new JAccessRules($array['rules']);
            $this->setRules($rules);
        }
        
        return parent::bind($array, $ignore);
    }
}
