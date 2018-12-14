<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Message;

class MessageAdded extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message, $data)
    {
        //
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Сообщение через сайт')
                    ->greeting(' ')
                    ->line('Через сайт отправлено сообщение от посетителя ' . mb_strtoupper($this->data['sig']) )
                    ->line(' …' . $this->data['text'] . '…')
                    ->line('Ответить отправителю: <a href="mailto:' . $this->data['email'] . '">' . $this->data['email'] . '</a>'  )
                    ->action('Перейти в админку ?', url('/admin') )
                    ->salutation('С приветом, я, (Дима) !');
    }

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
