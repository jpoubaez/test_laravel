<?php
    namespace App\Services;

    class ConvertKitNewsletter implements NewsletterInt
    {
        public function subscriure(string $email, string $llista = null) // triem la llista on guardarem el correu
        {
            // subscriure usuari amb les apis que necessiti el servei en concret
        }

        protected function client()
        { 
            // configurar el serveis amb les claus que calgui i obtenir una instancia de la llista
        }
    }
?>