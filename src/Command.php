<?php

namespace Redbastie\LivewireTailwindAuth;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class Command extends \Illuminate\Console\Command
{
    protected $signature = 'make:auth';

    public function handle()
    {
        $filesystem = new Filesystem;

        foreach ($filesystem->allFiles(__DIR__ . '/../stubs') as $file) {
            $filePath = Str::replaceLast('.stub', '', $file->getRelativePathname());
            $fileDir = $file->getRelativePath();

            if ($fileDir) {
                $filesystem->ensureDirectoryExists($fileDir);
            }

            $filesystem->put($filePath, $file->getContents());

            $this->warn('Created file: <info>' . $filePath . '</info>');
        }

        exec('npm install');
        exec('npm install tailwindcss@latest postcss@latest autoprefixer@latest @tailwindcss/forms -D');
        exec('npm run dev');

        Artisan::call('migrate:fresh --seed');

        $this->warn('Created user: <info>user@example.com:password</info>');
        $this->info('Auth scaffolded! <href=' . config('app.url') . '>' . config('app.url') . '</>');
    }
}
