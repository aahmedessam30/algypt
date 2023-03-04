<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Media implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $mimes = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'mp3', 'mp4', 'ogg', 'wav', 'webm', 'avi', 'mov', 'wmv', 'flv', 'mkv', '3gp', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv', 'zip', 'rar', '7z', 'tar', 'gz', 'bz2', 'json', 'xml', 'yaml', 'yml', 'csv', 'ics', 'rtf', 'bmp', 'tif', 'tiff', 'psd', 'ai', 'indd', 'eps', 'mpg', 'mpeg', 'mpga', 'm4a', 'aac', 'wma', 'm4v', 'fla', 'swf', 'sql'];
        if (!is_array($value)) {
            if (!in_array($value->extension(), $mimes, true)) {
                $fail(__('validation.mimes', ['attribute' => __('attributes.avatar'), 'values' => implode(', ', $mimes)]));
            }
        } else {
            foreach ($value as $file) {
                if (!in_array($file->extension(), $mimes, true)) {
                    $fail(__('validation.mimes', ['attribute' => __('attributes.avatar'), 'values' => implode(', ', $mimes)]));
                }
            }
        }
    }
}
