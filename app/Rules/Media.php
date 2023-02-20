<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Media implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $mimes = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'mp3', 'mp4', 'ogg', 'wav', 'webm', 'avi', 'mov', 'wmv', 'flv', 'mkv', '3gp', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv', 'zip', 'rar', '7z', 'tar', 'gz', 'bz2', 'json', 'xml', 'yaml', 'yml', 'csv', 'ics', 'rtf', 'bmp', 'tif', 'tiff', 'psd', 'ai', 'indd', 'eps', 'mpg', 'mpeg', 'mpga', 'm4a', 'aac', 'wma', 'm4v', 'fla', 'swf', 'sql'];
        if (!in_array($value->extension(), $mimes, true)) {
            $fail(__('validation.mimes', ['attribute' => __('attributes.avatar'), 'values' => implode(', ', $mimes)]));
        }
    }
}
