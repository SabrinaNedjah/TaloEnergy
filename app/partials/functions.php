<?php
if(!function_exists('not_empty'))
{
    function not_empty($fields = [])
    {
        if(count($fields) != 0)

        {
            foreach($fields as $field)
            {
                if(empty($_POST[$field]) || trim($_POST[$field]) == "")
                {
                    return false;
                }
            }
            return true;
        }
    }
}
