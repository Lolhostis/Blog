<?php
    class Validation {
        public static function cleanString(string $str):string {
            return filter_var($str, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        public static function cleanEmail(string $email):string {
            return filter_var($email, FILTER_SANITIZE_EMAIL);
        }
    }
?>
