<?php
    namespace App\Services;

    use MailchimpMarketing\ApiClient;

    class Newsletter implements NewsletterInt
    {
        public function subscriure(string $email, string $llista = null) // triem la llista on guardarem el correu
        {
            $llista ??= config('services.mailchimp.llistes.subscriptors'); // si $llista es null, posa-hi un valor

            return $this->client()->lists->addListMember($llista, [
            'email_address' => $email,
            'status' => 'subscribed'
            ]);
        }

        protected function client()
        { 
            return (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21'
            ]);
        }
    }
?>
