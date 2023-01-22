<?php

namespace App\Notifications;

use App\Models\Proposal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProposalCreatedNotification extends Notification
{
    use Queueable;
    public $proposal;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
     public function toDatabase($notifiable)
     {
         return new DatabaseMessage([
             'name' =>  $this->proposal->user->fname,
             'body' => 'applied for a project',
             'project' => $this->proposal->project->title,
             'link' => route('projects.index')
         ]);
     }

//    public function toBroadcast($notifiable)
//    {
//        // return [
//        //     'msg' => 'New Order',
//        //     'url' => url('/orders')
//        // ];
//        return (new BroadcastMessage([
//            'msg' => 'New Order',
//            'url' => url('/orders')
//        ]))->onConnection('sync');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
