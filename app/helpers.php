<?php

if (! function_exists('isTagSelected')) {
    function isTagSelected($id, $ids): string
    {
        return is_array($ids) && in_array($id, $ids) ? ' selected': '';
    }
}
