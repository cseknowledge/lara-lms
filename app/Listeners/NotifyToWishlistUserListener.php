<?php

namespace App\Listeners;

use App\Events\NotifyToWishlistUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Book;
use App\Models\User;
use App\Models\Message;
use App\Models\Wishlist;

class NotifyToWishlistUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NotifyToWishlistUserEvent $event)
    {
        $book = Book::findOrFail($event->book_id); 
        $wishlist = Wishlist::Where('book_id', $event->book_id)->Where('is_user_acknowledged', false)->first();
        $librarian = User::Where('member_type', 'Librarian')->first();
        
        if($book->quantity > 0 && (isset($wishlist) && $wishlist->count() > 0)) {            
            $message = new Message();
            $message->message = $book->book_name." is currently available in our library. Please collect as soon as possible.";
            $message->department = "Librarian";
            $message->wishlist_id =$wishlist->id;
            $message->message_from_user_id = $librarian->id;
            $message->save();

            $wishlist->is_user_acknowledged = true;
            $wishlist->update();
        }
    }
}
