<?php

namespace App\Notifications;
use App\agents;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
class add_new_agents extends Notification
{
    use Queueable;

    private $agents_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(agents $agents_id)
    {
        $this->agents_id = $agents_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

            //'data' => $this->details['body']
            'id'=> $this->agents_id->id,
            'title'=>'تم اضافة  عميل بواسطة :',
            'user'=> Auth::user()->name,

        ];
    }
}
