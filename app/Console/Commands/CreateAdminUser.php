<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Console\Question\Question;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create-user {name?} {email?}';

    protected $description = 'Create a dashboard administrator with a password entered securely';

    public function handle(): int
    {
        $name = trim((string) ($this->argument('name') ?: $this->ask('Administrator name')));
        $email = Str::lower(trim((string) ($this->argument('email') ?: $this->ask('Administrator email'))));

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('A name and a valid email address are required.');

            return self::INVALID;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('A user with that email already exists. No account was changed.');

            return self::FAILURE;
        }

        $password = $this->askForHiddenValue('Password (minimum 12 characters)');
        $confirmation = $this->askForHiddenValue('Confirm password');

        if (strlen((string) $password) < 12 || $password !== $confirmation) {
            $this->error('The passwords must match and contain at least 12 characters. No account was created.');

            return self::INVALID;
        }

        $admin = new User();
        $admin->name = $name;
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->email_verified_at = now();
        $admin->is_admin = true;
        $admin->save();

        $this->info('Administrator account created successfully.');

        return self::SUCCESS;
    }

    private function askForHiddenValue(string $prompt): string
    {
        $question = new Question($prompt . ': ');
        $question->setHidden(true);
        $question->setHiddenFallback(false);

        return (string) $this->getHelper('question')->ask($this->input, $this->output, $question);
    }
}
