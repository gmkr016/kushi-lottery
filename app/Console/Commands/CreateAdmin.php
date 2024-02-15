<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\note;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = text(
            label: 'Name',
            placeholder: 'enter admin name',
            default: 'admin',
            required: true);
        $email = text(
            label: 'Email',
            placeholder: 'enter admin email',
            default: 'admin@admin.com',
            required: true);
        $password = password(
            label: 'Password',
            placeholder: 'password',
            required: 'The password is required');
        $password = Hash::make($password);
        $confirm = confirm(
            label: 'Is everything okay?');
        if ($confirm) {
            $admin = Admin::query()->where('email', $email)->first();
            if ($admin) {
                $updatePasswordConfirm = confirm('Admin already exists. Do you want to update existing admin password?');
                if ($updatePasswordConfirm) {
                    $admin->password = $password;
                    $admin->save();
                    info('Existing admin password updated.');
                }
            } else {
                try {
                    Admin::query()->create(['name' => $name, 'email' => $email, 'password' => $password]);
                } catch (\Exception $exception) {
                    error("You have error:\n{$exception->getMessage()}");
                }
            }

        } else {
            note('Task cancelled.');
        }

    }
}
