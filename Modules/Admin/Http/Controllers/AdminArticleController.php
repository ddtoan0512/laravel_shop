<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);

        if ($request->name) {
            $articles->where('a_name', 'like', '%' . $request->name . '%');
        }

        $articles = $articles->paginate(10);

        $viewData = [
            'articles' => $articles
        ];

        return view('admin::article.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::article.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RequestArticle $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.update', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(RequestArticle $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function insertOrUpdate($requestArticle, $id = '')
    {
        // dd($requestArticle->all());
        $article = new Article();

        if ($id) {
            $article = Article::find($id);
        }
        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = $requestArticle->a_description;
        $article->a_content = $requestArticle->a_content;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description;
        
        if ($requestArticle->hasFile('avatar')) {
            $file = upload_image('avatar');
            
            if (isset($file['name'])) {
                $article->a_avatar = $file['name'];
            }
        }

        $article->save();
    }

    public function action($action, $id)
    {
        if ($action) {
            $article = Article::find($id);
            switch ($action) {
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active = !$article->a_active;
                    $article->save();
                    break;
                    // case 'hot':
                    //     $article->a_hot = !$article->a_hot;
                    //     $article->save();
                    //     break;
            }
        }

        return redirect()->back();
    }
}
