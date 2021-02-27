<?php

namespace Util;

class IO
{
    public static function pathinfo_enhanced($file_path)
    {
        $core_path_info = pathinfo($file_path);
        $filename = $core_path_info['filename'];

        if (isset($core_path_info['extension'])) {
            $extension = $core_path_info['extension'];
        } else {
            $extension = '';
        }

        $extension_parts = array();

        while (!empty($extension)) {
            array_unshift($extension_parts, $extension);

            $remaining_path_info = pathinfo($filename);
            $filename = $remaining_path_info['filename'];

            if (isset($remaining_path_info['extension'])) {
                $extension = $remaining_path_info['extension'];
            } else {
                $extension = '';
            }
        }

        $revised_path_info = array(
            'filename'  => $filename,
            'extension' => implode('.', $extension_parts),
        );

        return array_merge($core_path_info, $revised_path_info);
    }
}
