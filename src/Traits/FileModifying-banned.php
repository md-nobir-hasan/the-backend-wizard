<?php

namespace Nobir\TheBackendWizard\Traits;

use Illuminate\Support\Facades\File;

trait FileModifying
{
    //  // array face (array_for_replace)
    //     $array_for_replace = [
    //         ['searching_text'=>'{','inserting_position'=>2,'inserting_text'=>'....'],
    //          .....
    //          .....
    //     ];
    //If you give the inserting_positition 1 then the inserting_text insert in just after the sesaching_text don't repalce the seraching_text.
    //If you give the inserting_position 0 then the inserting_text replace the serching_text

    public function modify($get_content_path, $put_content_path, $array_for_replace = null)
    {
        $content = $this->getContent($get_content_path, $array_for_replace);
        $this->putContent($put_content_path, $content);
    }

    public function getContent($get_content_path, $array_for_replace = null)
    {
        if(!File::exists($get_content_path)){
            echo "The path does't exist. line 27, file 'FileModifiying.php'. ($get_content_path)";
            return false;
        }

        $content = File::get($get_content_path);

        if ($array_for_replace) {
            $content = $this->insertOrReplacePartOfContent($content, $array_for_replace);
        }
        return $content;
    }

    public function strposnNth($haystack, $needle, $nth)
    {
        $pos = 0;
        for ($i = 0; $i < $nth; $i++) {
            $pos = strpos($haystack, $needle, $pos + 1);
            if (
                $pos === false
            ) {
                return false;
            }
        }
        return $pos;
    }

    public function insertOrReplacePartOfContent($content, $array_for_insert_or_replace)
    {
        foreach ($array_for_insert_or_replace as $value) {
            //position for the replace or insert line
            if (isset($value['searching_text']) && isset($value['inserting_position'])) {
                $insert_position = $this->strposnNth($content, $value['searching_text'], $value['inserting_position']);
            } elseif (isset($value['searching_text'])) {
                $insert_position = strpos($content, $value['searching_text'], 0);
            }

            //replace or insert
            if (isset($insert_position) && isset($value['inserting_text'])) {
                if ($insert_position !== false) {
                    $content = substr_replace($content, $value['inserting_text'], $insert_position, 0);
                } else {
                    echo 'Inserting position is not found';
                }
            } elseif (isset($value['inserting_text'])) {
                $content = $content . $value['inserting_text'];
            }else{
                echo 'There is no inserting text';
            }
        }
        return $content;
    }
}
