<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEmail;
use Illuminate\View\View;

class EmailController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $emails = UserEmail::query()
            ->where('user_id', $request->user()?->id)
            ->get()
            ->toArray();

        return view('emails.list', [
            'emails' => $emails
        ]);
    }

    /**
     * @param Request $request
     * @param $email_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Request $request, $email_id)
    {
        $email = UserEmail::query()
            ->where('email_id', $email_id)
            ->first()
            ->toArray();

        $email['createdDateTime'] = date('Y-m-d H:i', strtotime($email['createdDateTime']));

        return view('emails.page', compact('email'));
    }
}
