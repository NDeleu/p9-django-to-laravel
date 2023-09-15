<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TicketFormRequest;
use App\Http\Requests\ReviewFormRequest;
use App\Http\Requests\FollowUsersFormRequest;
use App\Models\Ticket;
use App\Models\Review;
use App\Models\User;

class RthomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $user = Auth::user();
        $followedUsers = $user->follows->pluck('id');
        $tickets = Ticket::whereIn('user_id', $followedUsers)->orWhere('user_id', $user->id)->get();
        $reviews = Review::whereIn('user_id', $followedUsers)->orWhere('user_id', $user->id)->orWhereIn('ticket_id', $tickets->pluck('id'))->get();
        $ticketsAndReviews = $tickets->concat($reviews)->sortByDesc('time_created');

        return view('rthome.home', ['tickets_and_reviews' => $ticketsAndReviews]);
    }

    public function postEdit()
    {
        $user = Auth::user();
        $tickets = Ticket::where('user_id', $user->id)->get();
        $reviews = Review::where('user_id', $user->id)->get();
        $ticketsAndReviews = $tickets->concat($reviews)->sortByDesc('time_created');

        return view('rthome.post_edit', ['tickets_and_reviews' => $ticketsAndReviews]);
    }

    public function createTicket()
    {
        return view('rthome.create_ticket');
    }

    public function storeTicket(TicketFormRequest $request) // Utilisation de TicketFormRequest
    {
        $validatedData = $request->validated(); // Utilisez la méthode validated() pour obtenir les données validées

        $ticket = new Ticket();
        $ticket->title = $validatedData['title'];
        $ticket->description = $validatedData['description'];
        $ticket->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets');
            $ticket->image = $imagePath;
        }

        $ticket->save();

        return redirect()->route('home');
    }

    public function createReview($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        // Affiche le formulaire de création de revue
        return view('rthome.create_review', compact('ticket'));
    }

    public function storeReview(ReviewFormRequest $request, $ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        $review_compared = Review::where('ticket_id', $ticket->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($review_compared) {
            return redirect()->route('error_review', ['ticket_id' => $ticket->id]);
        }

        $validatedData = $request->validated();

        $review = new Review();
        $review->headline = $validatedData['headline'];
        $review->rating = $validatedData['rating'];
        $review->body = $validatedData['body'];
        $review->user_id = Auth::id();
        $review->ticket_id = $ticket->id;

        $review->save();

        return redirect()->route('home');
    }

    public function errorReview($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        return view('rthome.error_review', compact('ticket'));
    }

    public function createTicketAndReview()
    {
        return view('rthome.create_ticket_review');
    }

    public function storeTicketAndReview(TicketFormRequest $ticketRequest, ReviewFormRequest $reviewRequest)
    {
        // Utilise les Form Request pour la validation des données
        $validatedTicketData = $ticketRequest->validated();
        $validatedReviewData = $reviewRequest->validated();

        // Crée un ticket avec les données validées
        $ticket = new Ticket();
        $ticket->title = $validatedTicketData['title'];
        $ticket->description = $validatedTicketData['description'];
        $ticket->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets');
            $ticket->image = $imagePath;
        }

        $ticket->save();

        // Crée une revue avec les données validées
        $review = new Review();
        $review->headline = $validatedReviewData['headline'];
        $review->rating = $validatedReviewData['rating'];
        $review->body = $validatedReviewData['body'];
        $review->user_id = Auth::id();
        $review->ticket_id = $ticket->id;

        $review->save();

        return redirect()->route('home');
    }

    public function editTicket($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        if ($ticket->user_id !== Auth::id()) {
            return redirect()->route('error_change_ticket', ['ticket_id' => $ticket->id]);
        }

        return view('rthome.edit_ticket', compact('ticket'));
    }

    public function updateTicket(TicketFormRequest $request, $ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        if ($ticket->user_id !== Auth::id()) {
            return redirect()->route('error_change_ticket', ['ticket_id' => $ticket->id]);
        }

        $validatedData = $request->validated();

        $ticket->title = $validatedData['title'];
        $ticket->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets');
            $ticket->image = $imagePath;
        }

        $ticket->save();

        return redirect()->route('post_edit');
    }

    public function deleteTicket($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        if ($ticket->user_id !== Auth::id()) {
            return redirect()->route('error_change_ticket', ['ticket_id' => $ticket->id]);
        }

        return view('rthome.delete_ticket', compact('ticket'));
    }

    public function destroyTicket($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        if ($ticket->user_id !== Auth::id()) {
            return redirect()->route('error_change_ticket', ['ticket_id' => $ticket->id]);
        }

        $ticket->delete();

        return redirect()->route('post_edit');
    }

    public function errorChangeTicket($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        return view('rthome.error_change_ticket', compact('ticket'));
    }

    public function editReview($ticket_id, $review_id)
    {
        $review = Review::findOrFail($review_id);
        $ticket = Ticket::findOrFail($ticket_id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->route('error_change_review', ['ticket_id' => $ticket->id, 'review_id' => $review->id]);
        }

        return view('rthome.edit_review', compact('ticket', 'review'));
    }

    public function updateReview(ReviewFormRequest $request, $ticket_id, $review_id)
    {
        $review = Review::findOrFail($review_id);
        $ticket = Ticket::findOrFail($ticket_id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->route('error_change_review', ['ticket_id' => $ticket->id, 'review_id' => $review->id]);
        }

        $validatedData = $request->validated();

        $review->headline = $validatedData['headline'];
        $review->rating = $validatedData['rating'];
        $review->body = $validatedData['body'];

        $review->save();

        return redirect()->route('post_edit');
    }

    public function deleteReview($ticket_id, $review_id)
    {
        $review = Review::findOrFail($review_id);
        $ticket = Ticket::findOrFail($ticket_id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->route('error_change_review', ['ticket_id' => $ticket->id, 'review_id' => $review->id]);
        }

        return view('rthome.delete_review', compact('ticket', 'review'));
    }

    public function destroyReview($ticket_id, $review_id)
    {
        $review = Review::findOrFail($review_id);
        $ticket = Ticket::findOrFail($ticket_id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->route('error_change_review', ['ticket_id' => $ticket->id, 'review_id' => $review->id]);
        }

        $review->delete();

        return redirect()->route('post_edit');
    }

    public function errorChangeReview($ticket_id, $review_id)
    {
        $review = Review::findOrFail($review_id);
        $ticket = Ticket::findOrFail($ticket_id);

        return view('rthome.error_change_review', compact('ticket', 'review'));
    }

    public function ticketDetail($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        return view('rthome.ticket_detail', compact('ticket'));
    }

    public function reviewDetail($ticket_id, $review_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $review = Review::findOrFail($review_id);

        return view('rthome.review_detail', compact('ticket', 'review'));
    }

    public function followUsersForm()
    {
        $mainUser = User::where('username', auth()->user()->username)->first();
        $followingAll = $mainUser->following;
        $followedByAll = $mainUser->followedBy;

        return view('rthome.follow_users_form', compact('followingAll', 'followedByAll'));
    }

    public function followUsersStore(FollowUsersFormRequest $request)
    {
        $userToFollow = User::where('name', $request->input('follows'))->first();

        if ($userToFollow->id === auth()->id()) {
            return redirect()->route('error_self_follow');
        }

        auth()->user()->follows()->attach($userToFollow);

        return redirect()->route('follow_users_form');
    }

    public function errorSelfFollow()
    {
        return view('rthome.error_self_follow');
    }

    public function deleteFollow($following_id)
    {
        $mainUser = User::where('username', auth()->user()->username)->first();
        $following = $mainUser->following->find($following_id);

        if ($following) {
            $mainUser->following()->detach($following);
        }

        return redirect()->route('follow_users_form');
    }
}
