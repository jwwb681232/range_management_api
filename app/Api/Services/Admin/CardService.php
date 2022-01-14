<?php

namespace App\Api\Services\Admin;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
     * @return Builder|Collection|Model|null
     */
    public function show(Request $request)
    {
        return $this->model->with([
                'user'=>fn($query)=>$query->with(['unit:id,name','card:id,number','modes:id,name'])->select(['id','name','unit_id','card_id','status','created_at'])
            ])
            ->findOrFail($request->id,['id','number','created_at']);
    }

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $unit    = $request->input('unit');
        $mode    = $request->input('mode');

        $page    = $request->input('page', 1);
        $limit   = $request->input('limit', 10);
        $offset  = ($page - 1) * $limit;

        $condition = $this->model->newQuery()
            ->when($keyword, fn($query) => $query->where('number', 'LIKE', "%$keyword%"))
            ->when($unit, fn($query) => $query->whereHas('user', fn($subQuery) => $subQuery->where('unit_id', $unit)))
            ->when($mode, fn($query) => $query->whereHas('user', fn($userQuery) => $userQuery->whereHas('modes', fn($modesQuery) => $modesQuery->where('id', $mode))));

        $data['count']     = $condition->count();
        $data['page']      = $page;
        $data['limit']     = $limit;
        $data['countPage'] = ceil($data['count'] / $limit);

        $result = $condition->with([
                'user'=>fn($query)=>$query->with(['unit:id,name','modes:id,name'])->select(['id','name','unit_id','card_id'])
            ])
            ->offset($offset)
            ->limit($limit)
            ->get();

        $data['list'] = IndexTransformer::transform($result);

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
        $card->number = $request->number;
        $card->save();

        if ($request->user_id){
            User::whereCardId($request->id)->update(['card_id'=>0]);
            User::whereId($request->user_id)->update(['card_id'=>$request->id]);
        }

        return $card->only(['id','number']);
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function destroy($id)
    {
        User::whereCardId($id)->update(['card_id'=>0]);
        return $this->model->destroy($id);
    }
}
