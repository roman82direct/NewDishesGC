<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Maincategory;
use App\Models\Good;
use App\Models\User;
use App\Services\LoadDataXLS;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;

class AdminController extends Controller
{
    public function updateCategory($id)
    {
        return view('admin.editCat', ['category' => Category::find($id)]);
    }

    public function deleteCategory($id)
    {
        return view('admin.editCat', ['category' => Category::find($id)]);
    }

    public function createGood(){
        return view('admin.editGood', ['good' => new Good(), 'categories' => Category::all()]);
    }

    public function updateGood($id)
    {
        return view('admin.editGood', ['good' => Good::find($id), 'categories' => Category::all()]);
    }

    /**
     * using middleware SaveGood
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function saveGood(){
        $message = app()->make('message');
        if ($message == 'Данные сохранены'){
            $id = Good::query()->orderBy('updated_at', 'DESC')
                ->limit(1)
                ->value('id');
            return redirect()->route('admin::good::update', ['id'=>$id,'categories' => Category::all()])
                ->with('success', $message);
        } else {
        return redirect()->back()->with('success', $message);
        }
    }

    public function deleteGood($id)
    {
        Good::destroy($id);

        return redirect()->back()->with('success', 'Данные удалены!');
    }

    /**
     * using middleware FileUpload
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function uploadGoodsFromExcel(){
        $message = (new LoadDataXLS)->loadXLS();
        return redirect()->back()->with('success', $message);
    }

    public function showUsers(){
        return view('admin.users', ['users'=>User::all()]);
    }

    public function showGoods(){
        $goods = Good::query()
//            ->orderBy('category_id')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        return view('admin.goods', ['goods'=>$goods]);
    }

    public function deleteAll(){
        Maincategory::truncate();
        Category::truncate();
        Collection::truncate();
        Good::truncate();
        return redirect()->back()->with('success', 'Данные удалены');
    }

    public function showComments(){
        return view('admin.comments', ['comments'=>Comment::whereIsModerate(false)->get()]);
    }

    public function moderateComment($id){
        Comment::findOrFail($id)
            ->update(['is_moderate' => 1]);

        return redirect()->back()->with('success', 'Комментарий прошел модерацию');
    }

    public function deleteComment($id){
        Comment::destroy($id);

        return redirect()->back()->with('success', 'Комментарий удален');
    }
}
