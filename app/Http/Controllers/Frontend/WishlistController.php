<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\WishlistRepository;
use App\Http\Requests\WishlistPostRequest;

use App\Models\Wishlist;

class WishlistController extends Controller
{
    protected $wishlistRepository;
   
    public function __construct(Wishlist $wishlist)
    {
        $this->middleware('auth');
        $this->wishlistRepository = new WishlistRepository($wishlist);
    }
    
    public function index()
    {
        $wishlists = $this->wishlistRepository->all();
        return view('frontend.wishlist.index', compact('wishlists'));
    }
    
    public function create()
    {
        $books = $this->wishlistRepository->getBooks();
        return view('frontend.wishlist.create', compact('books'));
    }
    
    public function store(WishlistPostRequest $request)
    {        
        $this->wishlistRepository->create($request->only($this->wishlistRepository->getModel()->fillable));  
        return redirect('/wishlist/')->with('flash_message', 'Book suggest added successfully');
    }
    
    public function show($id)
    {
        $wishlist = $this->wishlistRepository->show($id);
        $previousWishlistId = $this->wishlistRepository->getPreviousWishlistId($id);
        $nextWishlistId = $this->wishlistRepository->getNextWishlistId($id);
        return view('frontend.wishlist.show', compact('wishlist', 'previousWishlistId', 'nextWishlistId'));
    }

    public function edit($id)
    {
        $wishlist = $this->wishlistRepository->show($id);
        $previousWishlistId = $this->wishlistRepository->getPreviousWishlistId($id, 'edit');
        $nextWishlistId = $this->wishlistRepository->getNextWishlistId($id, 'edit');      
        $books = $this->wishlistRepository->getBooks();  
        return view('frontend.wishlist.edit', compact('wishlist', 'previousWishlistId', 'nextWishlistId', 'books'));
    }
    
    public function update(WishlistPostRequest $request, $id)
    {
        $this->wishlistRepository->update($request->only($this->wishlistRepository->getModel()->fillable), $id);

        return redirect('/wishlist/')->with('flash_message', 'Book suggest updated successfully');
    }
    
    public function destroy($id)
    {
        $this->wishlistRepository->delete($id);

        return redirect('/wishlist/')->with('flash_message', 'Wishlist information deleted successfully');
    }
}
