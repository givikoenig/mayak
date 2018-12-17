<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Testimonial;

class TestimonialAdded extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Testimonial $testimonial, $data)
    {
        //
        $this->testimonial = $testimonial;
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
        $url = url('/admin/site/testimonials/'. $this->testimonial->id . '/edit');
        return (new MailMessage)
                    ->subject('Отзыв на сайте')
                    ->greeting(' ')
                    ->line('На сайте новый отзыв пользователя ' . mb_strtoupper($this->data['sig']) .  ' об отдыхе в доме "У маяка" : ')
                    ->line(' …' . $this->data['text'] . '…')
                    ->action('Перейти в админку для активации ?', $url ) //url('/admin/site/testimonials') )
                    ->salutation('С приветом, я (Дима) !');
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
