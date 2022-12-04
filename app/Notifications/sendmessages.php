<?php
namespace App\Notifications;

use App\Order;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use App\Channels\WhatsAppChannel;
use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class OrderProcessed extends Notification
{
  use Queueable;


  protected $Student;

  public function __construct(Student $Student)
  {
    $this->Student = $Student;
  }
  
  public function via($notifiable)
  {
    return [WhatsAppChannel::class];
  }
  
  public function toWhatsApp($notifiable)
  {
    // $orderUrl = url("/orders/{$this->order->id}");
    $form = 'Zuri Form';
    // $deliveryDate = $this->order->created_at->addDays(4)->toFormattedDateString();


    return (new WhatsAppMessage)
        ->content("This is a notification to let you know that Someone just filled out the {$form}.");
  }
}
