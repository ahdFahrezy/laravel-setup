<?php

namespace App\Console\Commands\Traits;

trait ServiceProviderInjector
{
    protected function injectCodeToRegisterMethod(string $filePath, string $codeToAdd)
    {
        if (!file_exists($filePath)) {
            $this->error("File not found: $filePath");
            return;
        }

        $fileContent = file_get_contents($filePath);

        if (strpos($fileContent, $codeToAdd) !== false) {
            // Sudah ada, tidak perlu ditambahkan lagi
            return;
        }

        $pattern = '/public function register\(\)\s*\{\n/';
        $replacement = "public function register()\n\t{\n" . $codeToAdd;

        $newContent = preg_replace($pattern, $replacement, $fileContent, 1);

        if ($newContent === null) {
            $this->error("Gagal menyisipkan kode ke AppServiceProvider.");
            return;
        }

        file_put_contents($filePath, $newContent);
        $this->info("Kode binding berhasil ditambahkan ke AppServiceProvider.");
    }
}
