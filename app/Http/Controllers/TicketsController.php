<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;


use App\Http\Requests\TicketFormRequest;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    //
    public function create()

    {

        return view('tickets.create');
    }

    public function store(TicketFormRequest $request)
    
    {
        $slug = uniqid();
        $ticket = new Ticket(array(
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'slug' => $slug
    ));

    $ticket->save();

    return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);

    $data = array(
        'ticket' => $slug,
        );
        Mail::send('emails.ticket', $data, function ($message) {
        $message->from('yourEmail@domain.com', 'Learning Laravel');
        $message->to('yourEmail@domain.com')->subject('There is a new ticket!');
        });
    }


    public function index() 
    {
        
        $tickets = Ticket::all();
        
        return view('tickets.index', compact('tickets'));
    }

    public function show($slug)
    
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.show', compact('ticket'));
    }   

    public function edit($slug)
    
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit', compact('ticket')); 
    }

    public function update($slug, TicketFormRequest $request)
    
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        if($request->get('status') != null)
        
    {
        $ticket->status = 0;
    }
    
    else
         {
            $ticket->status = 1;
        }
    
        $ticket->save();
        return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');
}


    public function destroy($slug)

    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted!');
    
    }



}


