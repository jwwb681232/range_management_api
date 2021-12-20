<?php

namespace App\Api\Services\Admin;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Api\Transformers\Admin\Card\IndexTransformer;

class CardService
{
    public Card $model;

    public function __construct()
    {
        $this->model = new Card();
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $page    = $request->input('page', 1);
        $limit   = $request->input('limit', 10);
        $offset  = ($page - 1) * $limit;

        $condition = $this->model
            ->when($keyword,fn($query)=>$query->where('number','LIKE',"%$keyword%"));

        $data['count']     = $condition->count();
        $data['page']      = $page;
        $data['limit']     = $limit;
        $data['countPage'] = ceil($data['count'] / $limit);

        $data['list'] = IndexTransformer::transform(
            $condition->with([
                    'user'=>fn($query)=>$query->with(['unit:id,name','modes:id,name'])->select(['id','name','unit_id','card_id'])
                ])
                ->offset($offset)
                ->limit($limit)
                ->get()
        );

        return $data;
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function store(Request $request)
    {
        $card = $this->model->create(['number'=>$request->number]);

        User::whereId($request->user_id)->update(['card_id'=>$card->id]);

        return $card->only(['id','number']);
    }

    /**
     * @param  Request  $request
     *
     * @return Card|Card[]|Collection|Model|null
     */
    public function update(Request $request)
    {
        $card = $this->model->find($request->id);
        $card->name = $request->name;
        $card->status = $request->status;
        $card->save();

        return $card->only(['id','name','status']);
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
