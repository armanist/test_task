<?php

namespace App\Http\Controllers;

use Dcblogdev\MsGraph\Facades\MsGraph as MsGraphFacades;
use Dcblogdev\MsGraph\Models\MsGraphToken;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Redirector;
use Dcblogdev\MsGraph\MsGraph;
use Illuminate\Http\Request;
use App\Models\UserEmail;
use Illuminate\View\View;

class AccountConnectController extends Controller
{
    /**
     * Display the user's profile form.
     * @throws \Exception
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
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector|mixed|void
     */
    public function store(Request $request)
    {
        $msGraph = new MsGraph();

        if (!$msGraph->isConnected()) {
            return $msGraph->connect();
        } else {
            try {
                $messages = MsGraphFacades::get("me/messages?top=100");

                foreach ($messages['value'] as $email) {
                    UserEmail::query()->updateOrCreate(
                        [
                            'email_id' => $email['id']
                        ],
                        [
                            'user_id' => $request->user()?->id,
                            'email_id' => $email['id'],
                            'subject' => $email['subject'],
                            'bodyPreview' => $email['bodyPreview'],
                            'createdDateTime' => $email['createdDateTime'],
                            'parentFolderId' => $email['parentFolderId'],
                            'from' => $email['from']['emailAddress']['address'],
                            'to' => $email['toRecipients'][0]['emailAddress']['address'],
                            'isDraft' => $email['isDraft'],
                            'isRead' => $email['isRead'],

                        ]
                    );
                }

                return redirect(route('emails'));
            } catch (\Exception $e) {
                Log::error('Error: ' . $e->getMessage());
            }
        }
    }


    public function destroy(Request $request)
    {
        MsGraphToken::query()->where('email', $request->user()->email)->delete();
        return redirect(route('profile.edit'));
    }
}
