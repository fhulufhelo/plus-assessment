<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Mail\NewDeviceLogin;
use App\Models\UserLoginInfo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LogUserLoginInfo
{
    public function __construct(
        protected Request $request,
        protected Client $client
    ) {}

    public function handle(UserLoggedIn $event): void
    {
        $ip = $this->getIpAddress();
        $ip_location = $this->getIpLocation($ip);
        $login_at = now();
        $user_agent = $this->request->header('User-Agent');

        $last_login = $event->user->getLastLoginInfo();

        if (!$last_login || ($last_login->ip !== $ip && $last_login->user_agent !== $user_agent)) {
            Mail::to($event->user->email)->send(new NewDeviceLogin($event->user,$ip, $user_agent));
        }

      tap(new UserLoginInfo([
            'ip' => $ip,
            'ip_location' => $ip_location,
            'login_at' => $login_at,
            'user_agent' => $user_agent,
        ]), function ($loginInfo) use ($event) {
            $event->user->loginInfos()->save($loginInfo);
        });

    }

    private function getIpAddress(): string
    {
        return match (true) {
            app()->environment('local') => '172.67.202.60', //plusnarrative.com ip
            default => $this->request->getClientIp(),
        };
    }

    private function getIpLocation(string $ip): string
    {
        try {
            $response = $this->client->get("http://ip-api.com/json/{$ip}");

            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody(), true);
                return $this->formatLocationData($data);
            }
        } catch (\Exception $e) {
            // Log exception
        }

        return 'unknown';
    }

    private function formatLocationData(array $data): string
    {
        return "{$data['city']}, {$data['regionName']}, {$data['country']}";
    }

}

