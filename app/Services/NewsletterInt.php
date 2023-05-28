<?php
    namespace App\Services;


    interface NewsletterInt
    {
        public function subscriure(string $email, string $llista = null);
    }
?>