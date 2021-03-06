<?php

namespace App\Repos\Eloquent;

use App\Models\Article;
use App\Models\Slide;
use App\Repos\Eloquent\AbstractRepository;

class SlideRepository extends AbstractRepository
{
    protected $model = Slide::class;

    /**
     * @return Slide|array|mixed|null
     */
    public function all()
    {
        return Slide::select()->orderBy('order')->get();
    }

    /**
     * @return array
     */
    public function allFront()
    {   
        $slides = $this->all();

        $data = [];
        foreach ($slides as $slide) {
            if ($slide->article) {
                $data[] = $slide->article;
            }
        }

        /**
         * if there is no article on the slides
         * get article fakes
         */
        if (empty($data)) {
            for ($i=0; $i < 5; $i++) { 
                $data[] = Article::inRandomOrder()
                                    ->where('type', 'post')
                                    ->whereDate('opening_at', '<', date('Y-m-d H:i:s'))
                                    ->first();
            }
        }

        return $data;
    }

    /**
     * @param Article $article
     * 
     * @return bool
     */
    public function add(Article $article): bool
    {
        $slide = Slide::select()->where('article_id', null)->orderBy('order')->first();
        if (!$slide) {
            $this->setMessage('Todos slides estão lotado... Precisa remover pelo menos 1 para adicionar');
            return false;
        }

        $slide->article_id = $article->id;
        $slide->save();
        return true;
    }

    /**
     * @param int $id
     * @param string $order
     * 
     * @return void
     */
    public function updateOrder(int $id, string $order): void
    {
        $data = Slide::find($id);
        $data->order = $order;
        $data->save(); 
    }

    /**
     * @return void
     */
    public function remove(Slide $slide): void
    {
        $slide->article_id = null;
        $slide->save();
    }
}